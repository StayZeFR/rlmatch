<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class PlayerModel extends Model
{
    protected $table = "player";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "uuid", "username", "email", "token", "created_at"];

    public function getPlayerExists(string $id): bool
    {
        $player = $this->where("uuid", $id)->first();
        return $player !== null;
    }

    public function getPlayer(string $id): array
    {
        return $this->where("uuid", $id)->first();
    }

    public function getPlayerByUsername(string $username): array
    {
        return $this->where("username", $username)->first();
    }

    /**
     * @throws ReflectionException
     */
    public function insertPlayer(string $id, string $username): bool
    {
        $data = [
            "uuid" => $id,
            "username" => $username,
        ];

        return $this->insert($data);
    }
}