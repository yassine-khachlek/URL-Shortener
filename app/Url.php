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
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Get the url that owns the log.
     */
    public function url()
    {
        return $this->belongsTo('App\Url', 'url_id', 'id');
    }

    /*
    protected static function boot() {
        parent::boot();

        static::deleting(function($url) {
            $url->accessLogs()->delete();
        });
    }
    */
}
