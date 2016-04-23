<?php

namespace App\Http\Controllers;

use Twitter;
use Auth;
use Cache;
use Carbon;
use anlutro\LaravelSettings\Facade as Setting;
use Input;
use Session;
use Redirect;
use Illuminate\Http\Request;


use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tweets = Cache::remember('tweets', 1, function() {
        //     return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
        // });

        // if(!empty($tweets)) {
        //     return view('home', ['user' => Auth::user(), 'tweets' => $tweets]);

        // } else {
           return view('home', ['user' => Auth::user(), 'tweets' => []]);
        // }
    }

    public function store()
    {
        for ($i = 1; $i < 17; $i++){
            Setting::set('color_'.$i,input::get('color_'.$i));
        }
        Setting::save();
        Session::flash('message', 'Theme successfully saved !');
        return Redirect::to('home');
    }
}
