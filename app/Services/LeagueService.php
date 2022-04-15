<?php

namespace App\Services;

use App\Models\League;

class LeagueService
{
    public function getCurrent()
    {
        return League::find(1);
    }
    
}