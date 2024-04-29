<?php

namespace App\Controllers;

class PrivacyPolicyController extends BaseController
{
    public function view(): string
    {
        return view("pages/privacy_policy");
    }
}