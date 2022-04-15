<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTeam extends Model
{
    use HasFactory;
    
    public function team() 
    {
        return $this->belongsTo(Team::class);
    }
    
    public function fixturesAsHost()
    {
        return $this->hasMany(Fixture::class, 'home_group_team_id');
    }
    
    public function fixturesAsGuest()
    {
        return $this->hasMany(Fixture::class, 'away_group_team_id');
    }
    
    
    public function getFixturesAttribute()
    {
         return $this->fixturesAsHost->merge($this->fixturesAsGuest);
    }
    
    public function getResultsByWeekAttribute()
    {
        return $this->fixtures;
    }
}
