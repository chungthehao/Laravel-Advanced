<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StoreTeam;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public $teams;

    /**
     * # Service Injection
     * - Isolate logic in a different class that we can reuse across our application
     * - Makes our instance of the team repository class replaceable at runtime, making this much
     * easier for us to do any unit testing in this class
     */
    public function __construct(\App\Teams\Repository $teams)
    {
        $this->teams = $teams;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeam $request)
    {
        $team = new Team();
        $team->title = $request->title;
        $team->save();
        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        throw new \App\Exceptions\ActionNotCompletedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function points(Team $team)
    {
        $sum = $this->teams->points($team);

        return response()->json($sum);
    }
}
