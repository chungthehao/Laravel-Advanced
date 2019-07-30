<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // $ability is the action the user is attempting to reach
    // before method return true --> cho phep the user access the ability,
    // va nguoc lai (false to deny access)
    // null -> let it fall through to the corresponding ability method in our other policies
    public function before(User $user, $ability)
    {
        // Provide the ability to basically generate super user privileges
        if (is_null($user->team_id)) { // Ham y la: super user
            return true; // Cho access
        }
    }
}
