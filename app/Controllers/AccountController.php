<?php

namespace App\Controllers;

class AccountController extends BaseController
{
    public function view(): string
    {
        return view("pages/account");
    }
}