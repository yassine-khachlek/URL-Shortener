<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoLite extends Model
{
    /**
     * Get the country that owns the log.
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_code', 'code');
    }
}
