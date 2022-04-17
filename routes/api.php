<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GroupTeamController as GroupTeamController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('group')->controller(GroupTeamController::class)->group(function () {
    Route::post('/generate/fixtures/{group_id}', 'generateFixtures');
    Route::post('/simulate/week/{group_id}', 'simulateWeek');
    Route::post('/simulate/week/all/{group_id}', 'simulateAllWeeks');
    Route::post('/reset/{group_id}', 'resetWeek');
});

