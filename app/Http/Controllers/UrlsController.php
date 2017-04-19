<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Url;
use Validator;
use Config;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::orderBy('id', 'desc')->paginate(15);

        return view('urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Url::class);

        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('store', Url::class);

        $data = $request->all();
        $data['limit_per_user'] = Auth::user()->urls()->count();
        $data['limit_per_app'] = Url::count();

        $validator = Validator::make($data, [
            'url' => 'required|url',
            'limit_per_user' => 'numeric|max:'.(config::get('url.limit_per_user')-1),
            'limit_per_app' => 'numeric|max:'.(config::get('url.limit_per_app')-1),
        ]);

        $validator->message = function(){
            return [
                'limit_per_user' => 'A title is required',
                'limit_per_app'  => 'A message is required',
            ];
        };

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        }

        $url = new Url;
        $url->user_id = Auth::user()->id;
        $url->url = $request->get('url');
        
        $url->save();

        return redirect(route('urls.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $hexId
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request, $id)
    {
        $url = Url::findOrFail(hexdec($id));

        return view('urls.redirect', compact('url'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = Url::findOrfail($id);

        $this->authorize('delete', $url);

        $url->delete();

        return redirect(route('urls.index'));
    }
}
