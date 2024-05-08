<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{
    protected $table = "match";
    protected $primaryKey = "id";
    protected $allowedFields = ["id", "bo_id", "winner", "score_team1", "score_team2"];
}