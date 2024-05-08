<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{
    protected $table = "player";
    protected $primaryKey = "id";
    protected $allowedFields = ["email", "token", "created_at"];
}