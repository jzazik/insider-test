<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function homeGroupTeam()
    {
        return $this->belongsTo(GroupTeam::class, 'home_group_team_id');
    }
    
    public function awayGroupTeam()
    {
        return $this->belongsTo(GroupTeam::class, 'away_group_team_id');
    }
}
