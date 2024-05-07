<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Controller;
use League\OAuth2\Client\Token\AccessToken;
use MrPropre\OAuth2\Client\Provider\EpicGamesResourceOwner;

class PlayController extends Controller
{
    public function view(): string
    {
        return view("pages/play");
    }
}