<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Auth;
use Log;
use Flash;
use Input;
use Redirect;
use Session;

class AgentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        Log::info("creating agent ... \n".implode(",", Input::all()));
        $user = new User(Input::all());
        // $user->department_id = Input::get('department_id');
        Log::info($user);
        // process
        if ($user->save()) {
            // redirect
            Flash::success('Successfully created Agent!');
            return Redirect::route('agents.show', $user);
        } else {
            // redirect
            Flash::error($user->getErrors());
            return Redirect::back();
        }
    }

    /**
     * Update an existing resource in storage.
     *
     * @return Response
     */
    public function update($agent)
    {
        $user = User::findBySlug($agent);
        if (is_null($user)) {
            return Redirect::back();
        }
        // process
        if ($user->update(Input::all())) {
            // redirect
            $agent = $user->slug ? $user->slug : $agent;
            Flash::success('Successfully updated an Agent!');
            return Redirect::route('agents.show', $agent);
        } else {
            // redirect
            Flash::error($user->getErrors());
            return Redirect::back()->with('errors', $user->getErrors());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findBySlug($id);
        if (is_null($user)) {
            return Redirect::to('home');
        }
        return view('agents.show', ['user' => Auth::user(), 'agent' => $user]);
    }


    /**
     *Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findBySlug($id);
        if (is_null($user)) {
            Flash::error('No such Agent');
            return Redirect::to('home');
        }
        if (!$user->editable()) {
            Flash::error('You have no permission to edit this Agent');
            return Redirect::to('home');
        }
        return view('agents.edit', ['user' => Auth::user(), 'agent' => $user]);
    }

    public function index()
    {
        $agents = User::all();
        return view('agents.index', ['user' => Auth::user(), 'agents' => $agents]);
    }

}
