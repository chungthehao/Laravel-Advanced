<?php

namespace App;

use App\Scopes\PointScope;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected static function boot()
    {
        parent::boot();

        // This adds our scope onto the model for all queries performed.
        static::addGlobalScope(new PointScope());
    }
}
