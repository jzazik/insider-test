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
    
    public function getResultsAttribute()
    {
        return $this->fixtures->reduce(function ($carry, $fixture) {
            
            if ($fixture->home_group_team_score === null) {
                return $carry;
            }
            $homeTeamWin = $fixture->home_group_team_score > $fixture->away_group_team_score;
            $isHomeTeam = $this->id === $fixture->home_group_team_id;
            $isDraw = $fixture->home_group_team_score === $fixture->away_group_team_score;
            if ($isHomeTeam && $homeTeamWin) {
                $pts = 3;
            } elseif ($isDraw) {
                $pts = 1;
            } else {
                $pts = 0;
            }
            
            $carry['pts'] += $pts;
            $carry['p']++;
            $carry['w'] = 0;
            $carry['d'] = 0;
            $carry['l'] = 0;
            $carry['gd'] = 0;
            
            return $carry;
        }, ['pts' => 0, 'p' => 0]);
    }
}
