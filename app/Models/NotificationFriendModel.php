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
    public function sendNotification(int $playerId, int $friendId): bool
    {
        $model = new NotificationModel();
        $id = $model->sendNotification($playerId, $friendId);

        $data = [
            "notification_id" => $id
        ];

        return $this->insert($data);
    }

    public function hasNotification(int $playerId, int $friendId): bool
    {
        $builder = $this->db->table($this->table);
        return $builder->where("notification_id", function ($builder) use ($playerId, $friendId) {
            $builder->select("id")
                ->from("notification")
                ->where("send_by", $playerId)
                ->where("receive_by", $friendId);
        })->countAllResults() > 0;
    }

    public function getNotification(int $id): array
    {
        $builder = $this->db->table("notification_friend nf");
        return $builder->select("n.id, n.send_by, n.receive_by, n.send_at, n.expired_at")
            ->join("notification n", "n.id = nf.notification_id")
            ->where("n.id", $id)
            ->get()
            ->getRowArray();
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

    public function deleteNotification(int $id): bool
    {
        return $this->delete($id);
    }
}