<?php

namespace App\Http\Controllers;

use Twitter;
use Auth;
use Cache;
use Carbon;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        $tweets = Cache::remember('tweets', 1, function() {
            return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
        });

        if(!empty($tweets))
        {
            return view('home', ['user' => Auth::user(), 'tweets' => $tweets]);
        }
        else
        {
            return view('home', ['user' => Auth::user(), 'tweets' => []]);
        }
    }
}
