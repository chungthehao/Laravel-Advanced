<?php

namespace App;

class TeamPointsComposer
{
    public $teams;

    public function __construct(\App\Teams\Repository $teams)
    {
        $this->teams = $teams;
    }

    public function compose(\Illuminate\View\View $view)
    {
        $view->with('points', $this->teams->points(Team::first()));
    }
}