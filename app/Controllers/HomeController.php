<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function view(): string
    {
        helper("auth");
        $url = getUrl();
        echo $url;
        die();


        return view("pages/home");
    }
}