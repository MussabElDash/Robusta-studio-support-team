<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Auth;
use Flash;
use Input;
use Log;
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
        $user = new User(Input::all());
        // process
        if ($user->save()) {
            // redirect
            Flash::success('Successfully created an Agent!');
            return Redirect::route('agent.show', $user);
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
        $user = User::find($agent);
        if (is_null($user)) {
            Flash::error('No such Agent');
            return Redirect::back();
        }
        // process
        if ($user->update(Input::all())) {
            // redirect
            Flash::success('Successfully updated an Agent!');
            return Redirect::route('agent.show', $agent);
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
        $user = User::find($id);
        if (is_null($user)) {
            Flash::error('No such Agent');
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
        $user = User::find($id);
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

}
