<?php

namespace App\Models;

use CodeIgniter\Model;

class BoModel extends Model
{
    protected $table = "bo";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "type", "start_at", "token", "nb_bo", "team1_id", "team2_id", "winner", "created_by", "created_at"];
}