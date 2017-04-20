<?php

namespace App\Http\Middleware;

use App\GeoLite;
use App\Url;
use App\UrlAccessLog as Log;
use App\UserAgent;
use Closure;
use DB;
use Illuminate\Support\Facades\Auth;

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
        DB::transaction(function () use ($request) {
            $url = Url::findOrFail($request->segment(1));

            $url->increment('views_count');

            $url_access_log = new Log;

            $url_access_log->ip = $request->ip();

            /*
            * TODO: find country by ip
            */
            $geo_lite = GeoLite::where('start', '>=', $request->ip())->where('end', '<=', $request->ip())->first();

            $url_access_log->country_code = $geo_lite ? $geo_lite->country_code : null;

            $url_access_log->user()->associate(Auth::user());

            //$url_access_log->url()->associate($url);

            $user_agent = UserAgent::firstOrCreate(
                    ['name' => $request->header('User-Agent')],
                    ['name' => $request->header('User-Agent')]
                );

            $url_access_log->userAgent()->associate($user_agent);

            $url_access_log->url_id = $url->id;
            $url_access_log->url = $url->url;
            $url_access_log->url_short = $url->url_short;

            $url_access_log->save();
        });

        return $next($request);
    }
}
