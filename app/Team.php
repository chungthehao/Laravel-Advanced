<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $appends = ['users_count']; // Lay accessor nao ra luon.

    // Accessor
    public function getUsersCountAttribute()
    {
        return \DB::table('users')->where('users.team_id', $this->id)->count();
    }

    // Mutator
    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] = \Str::title($title);
    }*/
}
