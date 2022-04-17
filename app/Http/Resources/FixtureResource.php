<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FixtureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'week' => $this->week_number,
            'home' => $this->homeGroupTeam->team->name,
            'away' => $this->awayGroupTeam->team->name,
            'home_group_team_score' => $this->home_group_team_score,
            'away_group_team_score' => $this->away_group_team_score,
        ];
    }
}
