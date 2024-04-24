<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function view(): string
    {
        return view("pages/home");
    }
}