<?php

namespace App\Controllers\API;

use App\Models\FriendModel;
use App\Models\NotificationFriendModel;
use App\Models\NotificationModel;
use App\Models\PlayerModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;
use function PHPUnit\Framework\isNull;

class NotificationsController extends Controller
{
    public function getNotificationsFriends(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            return $this->response->setStatusCode(403);
        }

        $model = new NotificationFriendModel();
        $notifications = $model->getNotifications(session()->get("player")["id"]);

        $this->response->setStatusCode(200);
        return $this->response->setJSON($notifications);
    }

    /**
     * @throws ReflectionException
     */
    public function sendNotificationFriend(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            $this->response->setStatusCode(403);
            $this->response->setJSON(["message" => "Requête invalide"]);
        } else {
            $username = $this->request->getPost("username");

            $model = new PlayerModel();
            $player = $model->getPlayerByUsername($username);
            if (empty($player)) {
                $this->response->setStatusCode(400);
                $this->response->setJSON(["message" => "Joueur introuvable"]);
            } else {
                if ($player["id"] === session()->get("player")["id"]) {
                    $this->response->setStatusCode(400);
                    $this->response->setJSON(["message" => "Vous ne pouvez pas vous ajouter en ami"]);
                } else {
                    $model = new FriendModel();
                    if ($model->isFriend(session()->get("player")["id"], $player["id"])) {
                        $this->response->setStatusCode(400);
                        $this->response->setJSON(["message" => "Vous êtes déjà ami avec ce joueur"]);
                    } else {
                        $model = new NotificationFriendModel();
                        if ($model->hasNotification(session()->get("player")["id"], $player["id"])) {
                            $this->response->setStatusCode(400);
                            $this->response->setJSON(["message" => "Demande déjà envoyée"]);
                        } else {
                            if (!$model->sendNotification(session()->get("player")["id"], $player["id"])) {
                                $this->response->setStatusCode(500);
                                $this->response->setJSON(["message" => "Erreur lors de l'envoi de la notification"]);
                            } else {
                                $this->response->setStatusCode(200);
                                $this->response->setJSON(["message" => "Demande d'ami envoyée"]);
                            }
                        }
                    }
                }
            }
        }

        return $this->response;
    }

    /**
     * @throws ReflectionException
     */
    public function acceptNotificationFriend(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            $this->response->setStatusCode(403);
            $this->response->setJSON(["message" => "Requête invalide"]);
        }

        $id = $this->request->getPost("notification_id");

        $model = new NotificationFriendModel();
        $notification = $model->getNotification($id);
        if (empty($notification)) {
            $this->response->setStatusCode(400);
            $this->response->setJSON(["message" => "Notification introuvable"]);
        } else {
            if ($notification["receive_by"] !== session()->get("player")["id"]) {
                $this->response->setStatusCode(403);
                $this->response->setJSON(["message" => "Vous n'êtes pas autorisé à accepter cette notification"]);
            } else {
                $model = new FriendModel();
                if ($model->isFriend($notification["send_by"], $notification["receive_by"])) {
                    $this->response->setStatusCode(400);
                    $this->response->setJSON(["message" => "Vous êtes déjà ami avec ce joueur"]);
                    $model = new NotificationFriendModel();
                    $model->deleteNotification($id);
                } else {
                    if (!$model->addFriend($notification["send_by"], $notification["receive_by"])) {
                        $this->response->setStatusCode(500);
                        $this->response->setJSON(["message" => "Erreur lors de l'ajout de l'ami"]);
                    } else {
                        $model = new NotificationFriendModel();
                        if (strtotime($notification["expired_at"]) > date("Y-m-d H:i:s")) {
                            $this->response->setStatusCode(400);
                            $this->response->setJSON(["message" => $notification["expired_at"]]);
                            $model->deleteNotification($id);
                        } else {
                            if (!$model->deleteNotification($id)) {
                                $this->response->setStatusCode(500);
                                $this->response->setJSON(["message" => "Erreur lors de la suppression de la notification"]);
                            } else {
                                $this->response->setStatusCode(200);
                                $this->response->setJSON(["message" => "Demande d'ami acceptée"]);
                            }
                        }
                    }
                }
            }
        }

        return $this->response;
    }

    public function declineNotificationFriend(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            $this->response->setStatusCode(403);
            $this->response->setJSON(["message" => "Requête invalide"]);
        } else {

            $id = $this->request->getPost("notification_id");

            $model = new NotificationFriendModel();
            $notification = $model->getNotification($id);
            if (empty($notification)) {
                $this->response->setStatusCode(400);
                $this->response->setJSON(["message" => "Notification introuvable"]);
            } else {
                if ($notification["receive_by"] !== session()->get("player")["id"]) {
                    $this->response->setStatusCode(403);
                    $this->response->setJSON(["message" => "Vous n'êtes pas autorisé à refuser cette notification"]);
                } else {
                    $model = new NotificationFriendModel();
                    if (strtotime($notification["expired_at"]) > date("Y-m-d H:i:s")) {
                        $this->response->setStatusCode(400);
                        $this->response->setJSON(["message" => "Notification expirée"]);
                        $model->deleteNotification($id);
                    } else {
                        if (!$model->deleteNotification($id)) {
                            $this->response->setStatusCode(500);
                            $this->response->setJSON(["message" => "Erreur lors de la suppression de la notification"]);
                        } else {
                            $this->response->setStatusCode(200);
                            $this->response->setJSON(["message" => "Demande d'ami refusée"]);
                        }
                    }
                }
            }
        }

        return $this->response;
    }

}