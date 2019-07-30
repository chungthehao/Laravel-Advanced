<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamCreateTest extends DuskTestCase
{
    // De viec test doc lap voi database (Tranh viec title rule la unique chay nhieu lan bi loi)
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatePass()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/teams/create')
                    ->type('title', 'SampleTeam')
                    ->press('Create')
                    ->assertPathIs('/teams');
        });
    }

    public function testCreateFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/teams/create')
                ->type('title', '')
                ->press('Create')
                ->assertPathIs('/teams/create');
        });
    }
}
