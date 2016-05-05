<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Ticket;
use App\Models\User;
use App\Events\TicketAssigned;
use Auth;
use Flash;
use Input;
use Log;
use Redirect;
use Session;
use Request;
use Event;

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
            return Redirect::route('agents.show', $user->slug);
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
            Flash::error('No such Agent');
            return Redirect::back();
        }
        // process
        if ($user->update(Input::all())) {
            // redirect
            Flash::success('Successfully updated an Agent!');
            return Redirect::route('agents.show', $agent->slug);
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
    public function show($agent)
    {
        $user = User::findBySlug($agent);
        if (is_null($user)) {
            Flash::error('No such Agent');
            return Redirect::to('home');
        }
        return view('agents.show', ['agent' => $user]);
    }


    /**
     *Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($agent)
    {
        $user = User::findBySlug($agent);
        if (is_null($user)) {
            Flash::error('No such Agent');
            return Redirect::to('home');
        }
        if (!$user->editable()) {
            Flash::error('You have no permission to edit this Agent');
            return Redirect::to('home');
        }
        return view('agents.edit', ['agent' => $user]);
    }

    public function index()
    {
        $agents = User::all();
        foreach($agents as $agent)
        {
            $agent->open= Ticket::openTickets($agent->id)->count();
            $agent->closed= Ticket::closedTickets($agent->id)->count();
        }

        Log::info("#####");
        Log::info($this->user['slug']);
        Event::fire(new TicketAssigned($this->user['id'], 2, $this->user['slug'], 'agents'));

        return view('agents.index', ['agents' => $agents]);
    }

    public function workspace(Request $request)
    {
        return view('agents.workspace',['agent' => $this->user,'tickets'=> $this->user->tickets()->open()->get()]);

    }
    public function closedTickets(Request $request){
        return view('agents.closed',['tickets'=>Ticket::closedTickets($this->user->id)->get(),'closed'=>true]);
    }
}
