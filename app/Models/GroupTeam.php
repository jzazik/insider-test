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
            
            $w = 0;
            $d = 0;
            $l = 0;
            $pts = 0;
            $gd = abs($fixture->home_group_team_score - $fixture->away_group_team_score);
            
            $homeTeamWin = $fixture->home_group_team_score > $fixture->away_group_team_score;
            $isHomeTeam = $this->id === $fixture->home_group_team_id;
            $isDraw = $fixture->home_group_team_score === $fixture->away_group_team_score;
            if ($isHomeTeam && $homeTeamWin) {
                $pts = 3;
                $w++;
                $gd = $fixture->home_group_team_score - $fixture->away_group_team_score;
            } elseif ($isDraw) {
                $pts = 1;
                $d++;
            } else {
                $l++;
                $gd = -$gd;
            }
            
            $carry['pts'] += $pts;
            $carry['p']++;
            $carry['w'] += $w;
            $carry['d'] += $d;
            $carry['l'] += $l;
            $carry['gd'] += $gd;
            
            return $carry;
        }, [
            'pts' => 0, 
            'p' => 0, 
            'w' => 0,
            'd' => 0,
            'l' => 0,
            'gd' => 0
        ]);
    }
}
