<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * Get the user that owns the url.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the url.
     */
    public function accessLogs()
    {
        return $this->hasMany('App\UrlAccessLog');
    }
}
