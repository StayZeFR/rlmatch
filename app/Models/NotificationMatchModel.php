<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationMatchModel extends Model
{
    protected $table = "notification_match";
    protected $primaryKey = "notification_id";
    protected $allowedFields = ["notification_id", "bo_id"];
}