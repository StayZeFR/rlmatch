<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use MrPropre\OAuth2\Client\Provider\EpicGamesResourceOwner;

class PlayController extends Controller
{
    public function view(): string
    {
        return view("pages/play");
    }
}