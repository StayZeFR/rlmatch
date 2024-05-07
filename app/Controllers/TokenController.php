<?php

namespace App\Controllers;

class TokenController extends BaseController
{
    public function view(): string
    {
        return view("pages/token");
    }
}