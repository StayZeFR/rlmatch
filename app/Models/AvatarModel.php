<?php

namespace App\Models;

use CodeIgniter\Model;

class AvatarModel extends Model
{
    protected $table = "avatar";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "player_id", "data", "created_at"];

    public function getAvatar(int $player_id): array
    {
        return $this->where("player_id", $player_id)->first();
    }

}