<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\PlayerModel;
use CodeIgniter\HTTP\ResponseInterface;

class PlayersController extends BaseController
{
    public function getPlayers(): ResponseInterface
    {
        if (!$this->request->isAJAX() || !session()->has("player")) {
            return $this->response->setStatusCode(403);
        }

        $model = new PlayerModel();
        $players = $model->getPlayers();

        $this->response->setStatusCode(200);
        return $this->response->setJSON($players);
    }
}