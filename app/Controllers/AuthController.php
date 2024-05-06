<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\HTTP\RedirectResponse;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class AuthController extends BaseController
{
    /**
     * @throws IdentityProviderException
     */
    public function callback(): void
    {
        $code = $this->request->getGet("code");
        $state = $this->request->getGet("state");

        if ($state !== session()->get("state")) {
            echo "<script>alert('Invalid state');</script>";
        } else if ($code) {
            $token = AuthModel::getToken($code);
            $user = AuthModel::getUser($token);

            session()->set("token", $token);
            session()->set("user", $user);
        }

        echo "<script>window.opener.location.reload();</script>";
        echo "<script>setTimeout(window.close, 500);</script>";
    }

    public function logout(): RedirectResponse
    {
        session()->remove("token");
        session()->remove("user");
        session()->remove("state");

        return redirect()->to(url_to("home"));
    }
}