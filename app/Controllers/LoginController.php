<?php

namespace App\Controllers;

class LoginController extends BaseController
{

    public function view(): string
    {
        return view("pages/auth/login");
    }

}