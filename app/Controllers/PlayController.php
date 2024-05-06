<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PlayController extends Controller
{
    public function view(): string
    {
        return view("pages/play");
    }
}