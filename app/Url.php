<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use SoftDeletes;

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
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Get the url that owns the log.
     */
    public function url()
    {
        return $this->belongsTo('App\Url', 'url_id', 'id');
    }

    /**
     * Get the user that owns the url.
     */
    public function accessLogs()
    {
        return $this->hasMany('App\UrlAccessLog', 'url_id', 'id');
    }
}
