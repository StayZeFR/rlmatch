<?php

namespace App\Controllers\API;

use App\Models\FriendModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class FriendsController extends Controller
{
    public function getFriends(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            $this->response->setStatusCode(403);
            $this->response->setJSON(["message" => "Requête invalide"]);
        } else {

            $model = new FriendModel();
            $friends = $model->getFriends(session()->get("player")["id"]);

            $this->response->setStatusCode(200);
            $this->response->setJSON($friends);
        }
        return $this->response;
    }
}