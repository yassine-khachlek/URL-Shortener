<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use \App\GeoLite;
use \App\UserAgent;
use \App\Url;
use \App\UrlAccessLog As Log;

class UrlAccessLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = Url::findOrFail($request->segment(1));

        $url_access_log = new Log;

        $url_access_log->ip = $request->ip();

        /*
        * TODO: find country by ip
        */
        $geo_lite = GeoLite::where('start', '>=', $request->ip())->where('end', '<=', $request->ip())->first();
        $url_access_log->country_code = $geo_lite ? $geo_lite->country_code : null;

        $url_access_log->user()->associate(Auth::user());
        
        $url_access_log->url()->associate($url);

        $url_access_log->userAgent()->associate(
            UserAgent::firstOrCreate(
                ['user_agent' => $request->header('User-Agent')], 
                ['user_agent' => $request->header('User-Agent')]
            )
        );

        $url_access_log->save();

        return $next($request);
    }
}
