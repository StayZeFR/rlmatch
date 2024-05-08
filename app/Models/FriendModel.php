<?php

namespace App\Models;

use CodeIgniter\Model;

class FriendModel extends Model
{
    protected $table = "friend";
    protected $primaryKey = ["player_id", "friend_id"];
    protected $allowedFields = ["player_id", "friend_id", "created_at"];
}