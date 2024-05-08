<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamMemberModel extends Model
{
    protected $table = "team_member";
    protected $primaryKey = ["team_id", "player_id"];
    protected $allowedFields = ["team_id", "player_id"];
}