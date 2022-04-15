<?php

namespace App\Http\Controllers;

use App\Http\Resources\LeagueResource;
use App\Models\Group;
use App\Services\LeagueService;
use Inertia\Inertia as Inertia;

class LeagueController extends Controller
{
    public function index(LeagueService $leagueService)
    {
        return Inertia::render(
            'Main', 
            [
                'data' => new LeagueResource($leagueService->getCurrent())
            ]
        );
    }
}
