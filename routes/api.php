<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController as ProductController;
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

Route::post('/group/generate/fixtures/{group_id}', [\App\Http\Controllers\GroupTeamController::class, 'generateFixtures']);
Route::post('/group/simulate/week/{group_id}', [\App\Http\Controllers\GroupTeamController::class, 'simulateWeek']);