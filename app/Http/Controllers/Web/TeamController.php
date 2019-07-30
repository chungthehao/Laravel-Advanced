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

        // Dang ky dung policy TeamPolicy
        $this->authorizeResource(Team::class, 'team');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // * 'Search' tra ve index cua cai dau tien match voi dieu kien
        return Team::all()->search(function ($team) {
            return $team->users_count > 2;
        });

        /*return Team::all()->reject(function ($team) {
            return $team->users_count > 2;
        });*/

        /*return Team::all()->filter(function ($team) {
            return $team->users_count > 2;
        });*/

        //return Team::all()->firstWhere('users_count', '>', 2);

        //return Team::all()->first(); // Filtering collections, first ele of the collections

        //-----------------------------------------------------------

        /*return Team::all()->map(function ($team, $key) {
            return $team->title;
        });*/

        # Use cases
        // - Displaying items through a grid
        // - Looping through a large CSV and finding ids or records, you want to chunk the searches in your db
        /*return Team::all()->chunk(2)->eachSpread(function ($team1, $team2) {
            dd($team1);
        });*/

        //-----------------------------------------------------------

        //return Team::paginate();
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
        // Use the policy for the team model & use the view authorization method (TeamPolicy@view)
        $this->authorize('view', $team);

        $sum = $this->teams->points($team);

        return response()->json($sum);
    }
}
