<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeagueResource;
use App\Models\Group;
use App\Models\GroupTeam;
use App\Services\FixtureService;
use App\Services\GroupService;
use App\Services\LeagueService;
use Illuminate\Http\Request;

class GroupTeamController extends Controller
{
    private $groupService;
    private $fixtureService;
    private $leagueService;
    
    public function __construct(GroupService $groupService, LeagueService $leagueService, FixtureService $fixtureService)
    {
        $this->groupService = $groupService;
        $this->leagueService = $leagueService;
        $this->fixtureService = $fixtureService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupTeam  $groupTeam
     * @return \Illuminate\Http\Response
     */
    public function show(GroupTeam $groupTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupTeam  $groupTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupTeam $groupTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupTeam  $groupTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupTeam $groupTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupTeam  $groupTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupTeam $groupTeam)
    {
        //
    }

    public function generateFixtures($group_id)
    {
        $this->fixtureService->getGroupFixtures(Group::findOrFail($group_id));
        return new LeagueResource($this->leagueService->getCurrent());
    }
    
    public function simulateWeek($group_id)
    {
        $this->groupService->simulateWeek(Group::findOrFail($group_id));
        return new LeagueResource($this->leagueService->getCurrent());
    }
    
    public function simulateAllWeeks($group_id)
    {
        $this->groupService->simulateAllWeeks(Group::findOrFail($group_id));
        return new LeagueResource($this->leagueService->getCurrent());
    }
    
    public function resetWeek($group_id)
    {
        $this->groupService->reset(Group::findOrFail($group_id));
        return new LeagueResource($this->leagueService->getCurrent());
    }
}
