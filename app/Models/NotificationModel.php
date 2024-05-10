<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class NotificationModel extends Model
{
    protected $table = "notification";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "send_by", "receive_by", "message", "send_at", "expired_at"];

    /**
     * @throws ReflectionException
     */
    public function sendNotification(int $sendBy, int $receiveBy): int
    {
        $data = [
            "send_by" => $sendBy,
            "receive_by" => $receiveBy,
            "message" => "",
            "send_at" => date("Y-m-d H:i:s"),
            "expired_at" => date("Y-m-d H:i:s", strtotime("+1 week"))
        ];

        return $this->insert($data);
    }

    public function getNotifications(int $playerId): array
    {
        $builder = $this->db->table("notification n");
        return $builder->select("n.id, n.send_by as send_by_id, getUsername(n.send_by) as send_by_username, n.receive_by as receive_by_id, getUsername(n.receive_by) as receive_by_username, getNotificationType(n.id) as type, n.expired_at")
            ->where("n.receive_by", $playerId)
            ->where("n.expired_at >", date("Y-m-d H:i:s"))
            ->orderBy("n.send_at", "desc")
            ->get()
            ->getResultArray();
    }

    public function getNotification(int $id): array
    {
        $builder = $this->db->table("notification n");
        return $builder->select("n.id, n.send_by, n.receive_by, getNotificationType(n.id) as type, n.expired_at")
            ->where("n.id", $id)
            ->get()
            ->getRowArray();
    }
}