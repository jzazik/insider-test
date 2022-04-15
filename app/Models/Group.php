<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public function groupTeams() {
        return $this->hasMany(GroupTeam::class);
    }
    
    public function fixtures() {
        return $this->hasManyThrough(Fixture::class, GroupTeam::class, 'group_id', 'home_group_team_id', 'id', 'id');
    }
    
    public static function getWithoutFixtures()
    {
        return self::where('is_fixture_generated', 0)->get();
    }
    
    public function getTeamsIdsArrayAttribute()
    {
        $teams = $this->groupTeams;

        return $teams->map(function ($team) {
            return $team->id;
        })->toArray();
    }
    
    
    
}
