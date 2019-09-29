<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['namespace' => 'Web'], function () {
    Route::resource('teams', 'TeamController');

    // * Test Route macros
    Route::get('/teams/{team}/title', function (\App\Team $team) {
        return response()->jTitle($team);
    })->middleware('log.team');

    // Test signed routes
    Route::get('/teams/{team}/activate', function () {
        return view('team/activate');
    })->name('activateTeam')->middleware('signed');

    Route::get('/teams/{team}/points', 'TeamController@points');
});

// * Default route values
// - {number?} tham so number la optional
// - Test custom user guards (o AuthServiceProvider)
Route::get('/square/{number?}', function ($number = 10) {
    return $number * $number;
})->middleware('auth:email'); // Use the middleware we defined in config/auth.php  for the 'email' key
// Phai la: http://homestead.test/square/6?email=henry@chung.   io moi vo dc (henry@chung.io la email dang login)


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
