<?php

namespace App\Http\Controllers;

use App\UrlAccessLog;

class UrlAccessLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', UrlAccessLog::class);

        $url_access_logs = UrlAccessLog::orderBy('id', 'desc')->paginate(15);

        return view('url-access-logs.index', compact('url_access_logs'));
    }
}
