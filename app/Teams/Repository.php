<?php

namespace App\Teams;

class Repository {

    public function points($team)
    {
        // Sub query, de xai cho whereIn o duoi
        $userIds = $team->where('teams.id', $team->id)
            ->join('users', 'users.team_id', '=', 'teams.id')
            ->select('users.id');

        return $team->where('teams.id', $team->id)
            ->join('tickets', 'tickets.team_id', '=', 'teams.id')
            ->join('points', 'points.ticket_id', '=', 'tickets.id')
            ->whereIn('points.owner_id', $userIds)
            ->sum('points.value');
    }

}