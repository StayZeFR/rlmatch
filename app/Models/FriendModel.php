<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class FriendModel extends Model
{
    protected $table = "friend";
    protected $primaryKey = ["player_id", "friend_id"];
    protected $allowedFields = ["player_id", "friend_id", "created_at"];

    public function isFriend(int $player_id, int $friend_id): bool
    {
        $friend = $this->where("player_id", $player_id)
            ->where("friend_id", $friend_id)
            ->first();
        return $friend !== null;
    }

    /**
     * @throws ReflectionException
     */
    public function addFriend(int $player_id, int $friend_id): bool
    {
        $data = [
            [
                "player_id" => $player_id,
                "friend_id" => $friend_id
            ],
            [
                "player_id" => $friend_id,
                "friend_id" => $player_id
            ]
        ];
        return $this->insertBatch($data);
    }

    public function getFriends(int $player_id): array
    {
        $builder = $this->db->table("friend f");
        $builder->select("f.friend_id, p.username, f.created_at");
        $builder->join("player p", "p.id = f.friend_id");
        $builder->where("f.player_id", $player_id);
        $builder->groupBy("f.friend_id, p.username, f.created_at");
        return $builder->get()->getResultArray();
    }
}