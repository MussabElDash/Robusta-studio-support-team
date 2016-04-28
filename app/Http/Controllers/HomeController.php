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
        if (!empty($tweets)) {
            return view('home', ['user' => Auth::user(), 'tweets' => $tweets]);
        } else {
            return view('home', ['user' => Auth::user(), 'tweets' => []]);
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
