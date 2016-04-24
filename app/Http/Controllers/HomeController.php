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
use Log;

use App\Http\Requests;
use App\Models\Department;

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
        Log::info('Showing user profile for user: ');
        $tweets = Cache::remember('tweets', 1, function () {
            return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
        });
        $departments = Department::lists('name', 'id');
        if (!empty($tweets)) {
            return view('home', ['user' => Auth::user(), 'tweets' => $tweets, 'departments' => $departments]);
        } else {
            return view('home', ['user' => Auth::user(), 'tweets' => [], 'departments' => $departments]);
        }
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
