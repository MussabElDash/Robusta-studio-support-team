<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

use Auth;
use Twitter;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comment = new Comment;
        $comment->user_id = $this->user->id;
        $comment->user_type = get_class($this->user);
        $comment->body = $request->get("body");
        $comment->ticket_id = $id;
        $tweet=json_decode(Twitter::postTweet(['status' => "@".$comment->ticket->customer->name." ".$comment->body, 'in_reply_to_status_id'=> Input::get('last_status_id')   ,'format' => 'json']),true);
        $comment->status_id = $tweet['id'];
        if ($comment->save()) {
            if ($request->ajax()) {
                return Response::json(["html" => view("comments._comment", ["comment" => $comment])->render(), "id" => $id]);
            }
        } else {
            // return error
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
