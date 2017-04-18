<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $appends = ['url_short'];

    public function getUrlShortAttribute()
    {
        return url(dechex($this->id));
    }

    /**
     * Get the user that owns the url.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the url that owns the log.
     */
    public function url()
    {
        return $this->belongsTo('App\Url');
    }

    /**
     * Get the user that owns the url.
     */
    public function accessLogs()
    {
        return $this->hasMany('App\UrlAccessLog');
    }
}
