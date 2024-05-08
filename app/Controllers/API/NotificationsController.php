<?php

namespace App\Controllers\API;

use App\Models\NotificationFriendModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

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
}