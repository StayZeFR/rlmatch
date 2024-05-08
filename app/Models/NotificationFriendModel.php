<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class NotificationFriendModel extends Model
{
    protected $table = "notification_friend";
    protected $primaryKey = "notification_id";
    protected $allowedFields = ["notification_id"];

    /**
     * @throws ReflectionException
     */
    public function addFriend(int $playerId, int $friendId): bool
    {
        $model = new NotificationModel();
        $id = $model->addNotification($friendId, $playerId, "Vous a ajouté en ami");

        $data = [
            "notification_id" => $id
        ];

        return $this->insert($data);
    }
}