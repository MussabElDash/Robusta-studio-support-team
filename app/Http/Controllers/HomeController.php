<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\Facade as Setting;
use App\Http\Requests;
use Auth;
use Cache;
use Carbon;
use Input;
use Redirect;
use Illuminate\Http\Request;
use Log;

use App\Models\Department;
use Session;
use Twitter;

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
        try {
            $tweets = Cache::remember('tweets', 1, function () {
                return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
            });
        }catch(\Exception $e) {
        }
        $departments = Department::lists('name', 'id');
        if (!empty($tweets)) {
            return view('home', ['user' => Auth::user(), 'tweets' => $tweets, 'departments' => $departments]);
        } else {
            return view('home', ['user' => Auth::user(), 'tweets' => [], 'departments' => $departments]);
        }
    }

    public function store()
    {
        for ($i = 1; $i < 17; $i++) {
            Setting::set('color_' . $i, input::get('color_' . $i));
        }
        Setting::save();
        Session::flash('message', 'Theme successfully saved !');
        return Redirect::to('home');
    }
}
