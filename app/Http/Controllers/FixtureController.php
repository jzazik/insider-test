<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeagueResource;
use App\Models\Fixture;
use App\Models\Group;
use App\Services\FixtureService;
use App\Services\LeagueService;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
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
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show(Fixture $fixture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixture $fixture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixture $fixture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixture $fixture)
    {
        //
    }
    
    public function generate($id, FixtureService $fixtureService, LeagueService $leagueService)
    {
        $fixtureService->getGroupFixtures(Group::find($id));
        return new LeagueResource($leagueService->getCurrent());
    }
}
