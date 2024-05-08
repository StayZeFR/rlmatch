<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PlayerModel;
use CodeIgniter\Controller;

class PlayController extends Controller
{
    public function view(): string
    {
        return view("pages/play");
    }
}