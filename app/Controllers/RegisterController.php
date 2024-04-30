<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
    public function view(): string
    {
        return view("pages/auth/register");
    }
}