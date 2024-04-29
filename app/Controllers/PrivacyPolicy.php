<?php

namespace App\Controllers;

class PrivacyPolicy extends BaseController
{
    public function view(): string
    {
        return view("pages/privacy_policy");
    }
}