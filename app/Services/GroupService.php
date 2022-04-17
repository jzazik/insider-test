<?php

namespace App\Services;

use App\Models\Group;

class GroupService
{
    private FixtureService $fixtureService;
    
    public function __construct(FixtureService $fixtureService)
    {
        $this->fixtureService = $fixtureService;
    }

    public function simulateWeek(Group $group)
    {
        $fixturesThisWeek = $group->fixtures()->whereNull('home_group_team_score')->limit(2)->orderBy('week_number')->get();
        
        foreach ($fixturesThisWeek as $fixture) {
            $this->fixtureService->simulateFixture($fixture);
        }
        
    }
    
    public function simulateAllWeeks(Group $group)
    {
        $fixturesThisWeek = $group->fixtures()->whereNull('home_group_team_score')->get();
        
        foreach ($fixturesThisWeek as $fixture) {
            $this->fixtureService->simulateFixture($fixture);
        }
        
    }
    
    public function reset(Group $group)
    {
        $group->fixtures()->delete();
    }
}