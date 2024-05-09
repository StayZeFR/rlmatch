<?php

namespace App\Models;

use CodeIgniter\Model;
use ReflectionException;

class NotificationModel extends Model
{
    protected $table = "notification";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "send_by", "receive_by", "message", "send_at", "response_at", "response", "expired_at"];

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
}