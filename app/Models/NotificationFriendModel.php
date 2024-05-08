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
        $id = $model->addNotification($playerId, $friendId, "Vous a ajouté en ami");

        $data = [
            "notification_id" => $id
        ];

        return $this->insert($data);
    }

    public function getNotifications(int $playerId): array
    {
        $builder = $this->db->table("notification_friend nf");
        return $builder->select("n.id, getUsername(n.send_by) as send_by, getUsername(n.receive_by) as receive_by, n.send_at, n.expired_at")
            ->join("notification n", "n.id = nf.notification_id")
            ->where("n.receive_by", $playerId)
            ->get()
            ->getResultArray();
    }
}