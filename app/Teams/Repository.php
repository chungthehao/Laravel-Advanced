<?php

namespace App\Teams;

class Repository {

    public function points($team)
    {
        return $team->where('teams.id', $team->id)
            ->join('tickets', 'tickets.team_id', '=', 'teams.id')
            ->join('points', 'points.ticket_id', '=', 'tickets.id')
            ->sum('points.value');
    }

}