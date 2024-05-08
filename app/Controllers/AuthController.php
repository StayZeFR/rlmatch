<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PlayerModel;
use CodeIgniter\HTTP\RedirectResponse;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use ReflectionException;

class AuthController extends BaseController
{
    /**
     * @throws IdentityProviderException
     * @throws ReflectionException
     */
    public function callback(): void
    {
        $code = $this->request->getGet("code");
        $state = $this->request->getGet("state");

        if ($state !== session()->get("state")) {
            echo "<script>alert('Invalid state');</script>";
        } else if ($code) {
            $token = AuthModel::getToken($code);
            $player = AuthModel::getUser($token);

            $model = new PlayerModel();
            if (!$model->getPlayerExists($player->getId())) {
                $model->insertPlayer($player->getId(), $player->getUsername());
            }

            $data = $model->where("uuid", $player->getId())->first();

            session()->set("token", $token);
            session()->set("player", [
                "id" => $data["id"],
                "uuid" => $player->getId(),
                "username" => $player->getUsername(),
                "email" => $data["email"],
                "token" => intval($data["token"])
            ]);
        }

        echo "<script>window.opener.location.reload();</script>";
        echo "<script>setTimeout(window.close, 500);</script>";
    }

    public function logout(): RedirectResponse
    {
        session()->remove("token");
        session()->remove("player");
        session()->remove("state");

        return redirect()->to(url_to("home"));
    }
}