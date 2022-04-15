<?php

namespace App\Services;

use App\Models\Fixture;
use App\Models\Group;

class FixtureService
{
    public function generateAllFixtures()
    {
        $groups = Group::getWithoutFixtures();
        
        foreach ($groups as $group) {
            $this->getGroupFixtures($group);
        }
    }
    
    public function getGroupFixtures(Group $group)
    {
        $ids = $group->teamsIdsArray;
        
        if (Fixture::where('home_group_team_id', $ids[0])->count()) {
            return true;
        }
        
        foreach ($this->generateFixtures($ids) as $i => $match) {
            Fixture::create([
                'week_number' => floor($i / 2) + 1,
                'home_group_team_id' => $match[0],
                'away_group_team_id' => $match[1],
            ]);
        }
        
        return true;
        
    }
    
    private function generateFixtures(array $ids)
    {
        // first round 
        for ($i = 0; $i < count($ids) - 1; $i++) {
            $tempIds = $ids;
            $matches[] = [$tempIds[0], $tempIds[$i + 1]];
            unset($tempIds[0]);
            unset($tempIds[$i + 1]);
            $tempIds = array_values($tempIds);

            $matches[] = [$tempIds[0], $tempIds[1]];
        }

        // second round
        for ($i = 0; $i < (count($ids) - 1) * 2; $i++) {
            $matches[] = [$matches[$i][1], $matches[$i][0]];
        }
        
        return $matches;
    }
}