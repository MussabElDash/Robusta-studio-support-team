<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Input;
use Redirect;
use Session;

class AgentsController extends Controller
{
    // validate
    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'role' => 'required',
        'password' => 'required',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store()
    {
        $user = new User(Input::all());
        $user->password = bcrypt($user->password);
        $user->sluggify();
        // process
        if ($user->save()) {
            // redirect
            Session::flash('message', 'Successfully created Agent!');
            return Redirect::action('AgentsController@show', @$user);
        } else {
            // redirect
            Session::flash('message', 'Error While creating Customer!');
            return Input::all();
        }
    }

}