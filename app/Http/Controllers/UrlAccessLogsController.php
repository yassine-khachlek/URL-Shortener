<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UrlAccessLog;
use Yajra\Datatables\Datatables;

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

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $query = UrlAccessLog::with('country', 'userAgent');

        return Datatables::of($query)->make(true);
    }
}
