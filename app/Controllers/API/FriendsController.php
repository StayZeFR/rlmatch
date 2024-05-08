<?php

namespace App\Controllers\API;

use App\Models\NotificationFriendModel;
use App\Models\PlayerModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class FriendsController extends Controller
{
    /**
     * @throws ReflectionException
     */
    public function add(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            return $this->response->setStatusCode(403);
        }

        $username = $this->request->getPost("username");

        $model = new PlayerModel();
        $player = $model->getPlayerByUsername($username);

        if (!$player) {
            $this->response->setStatusCode(400);
            return $this->response->setJSON([
                "status" => "error",
                "message" => "Player not found"
            ]);
        } else if ($player["id"] === session()->get("player")["id"]) {
            $this->response->setStatusCode(400);
            return $this->response->setJSON([
                "status" => "error",
                "message" => "You can't add yourself"
            ]);
        }
        $model = new NotificationFriendModel();
        $model->addFriend(session()->get("player")["id"], $player["id"]);

        $this->response->setStatusCode(200);
        return $this->response->setJSON([
            "status" => "success",
            "message" => "Friend request sent"
        ]);
    }
}