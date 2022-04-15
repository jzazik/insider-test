<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupTeam;
use App\Models\League;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::transaction(function () {
                $league = League::create([
                    'name' => 'Insider Champions League',
                ]);

                $group = $league->groups()->create([
                    'name' => 'A'
                ]);
                
                $teams = collect();
                foreach (['Liverpool', 'Manchester City', 'Chelsea', 'Arsenal'] as $teamName) {
                    $teams->push(Team::create(['name' => $teamName]));
                }
                
                $groupTeams = $teams->map(function ($team) use ($group) {
                    return [
                        'team_id' => $team->id,
                        'group_id' => $group->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                })->toArray();
                
                GroupTeam::insert($groupTeams);

            });
        } catch (\Throwable $e) {
            $this->command->error('Something went wrong!');
            $this->command->error($e->getMessage());
        }
        
    }
}
