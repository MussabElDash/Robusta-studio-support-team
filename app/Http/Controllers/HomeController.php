<?php

namespace App\Http\Controllers;

use anlutro\LaravelSettings\Facade as Setting;
use App\Http\Requests;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Ticket;
use Auth;
use Cache;
use Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Input;
use Mockery\CountValidator\Exception;
use Redirect;
use Illuminate\Http\Request;
use Log;
use DB;
use \Illuminate\Pagination\Paginator;

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
    public function index(Request $request)
    {
        try {
            $tweets = Cache::remember('tweets', 60, function () {
                return Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
            });
//            $tweets = Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
        } catch (\Exception $e) {
        }
        if (!empty($tweets)) {
            $tweets_filter = array();
            $i = 0;
            foreach ($tweets as $tweet) {
                if ($tweet['in_reply_to_status_id'] != null) {
                    if (!Comment::where('status_id', '=', $tweet['id'])->exists()) {
                        $comment = Comment::where('status_id', '=', $tweet['in_reply_to_status_id'])->first();
                        $ticket = Ticket::where('tweet_id', '=', $tweet['in_reply_to_status_id'])->first();
                        $reply = new Comment;
                        if ($comment != null) {
                            $reply->ticket_id = $comment->ticket->id;
                            $reply->user_id = $comment->ticket->customer->id;
                        } elseif ($ticket != null) {
                            $reply->ticket_id = $ticket->id;
                            $reply->user_id = $ticket->customer->id;
                        }
                        $reply->body = str_replace('@robusta_team1', '', $tweet['text']);
                        $reply->status_id = $tweet['id'];
                        $reply->user_type = Customer::class;
                        try {
                            $reply->save();
                        } catch (Exception $e) {
                            error_log($e->getMessage());
                        }
                    }
                } else {
                    $tweets_filter[$i] = $tweet;
                    $i++;
                }
            }
            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            //Create a new Laravel collection from the array data
            $collection = new Collection($tweets_filter);

            //Define how many items we want to be visible in each page
            $perPage = 5;

            //Slice the collection to get the items to display in current page
            $currentPageSearchResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

            //Create our paginator and pass it to the view
            $paginatedSearchResults = new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
            $paginatedSearchResults->setPath('home');

            return view('home', ['user' => Auth::user(),
                'tweets' => $paginatedSearchResults]);
            //Get current page form url e.g. &page=6
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

    public function twitterSettings(Request $request)
    {
        $settings = array('TWITTER_CONSUMER_KEY',
            'TWITTER_CONSUMER_SECRET',
            'TWITTER_ACCESS_TOKEN',
            'TWITTER_ACCESS_TOKEN_SECRET');
        $path = base_path('.env');
        if (file_exists($path)) {
            foreach ($settings as $setting) {
                file_put_contents($path, str_replace(
                    $setting . ' = ' . getenv($setting), $setting . ' = ' . Input::get($setting), file_get_contents($path)));
            }
        }
        return Redirect::to('home');
    }

}
