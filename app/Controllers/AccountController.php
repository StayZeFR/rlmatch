<?php

namespace App\Controllers;

class AccountController extends BaseController
{
    public function view(): string
    {
        return view("pages/account/account");
    }

    public function viewGames(): string
    {
        return view("pages/account/games");
    }

    public function viewToken(): string
    {
        return view("pages/account/token");
    }
}