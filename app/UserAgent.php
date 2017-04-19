<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_agent',
    ];

    /**
     * Get the user that owns the url.
     */
    public function accessLog()
    {
        return $this->hasMany('App\UrlAccessLog', 'id', 'user_agent_id');
    }
}
