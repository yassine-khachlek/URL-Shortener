<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlAccessLog extends Model
{
    /**
     * Get the user that owns the log.
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
     * Get the user agent that owns the log.
     */
    public function userAgent()
    {
        return $this->belongsTo('App\UserAgent', 'user_agent_id', 'id');
    }

    /**
     * Get the country that owns the log.
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_code', 'code');
    }
}
