<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Auth;

use App\Models\Ticket;

class TicketsController extends Controller
{

    // CRUD
    public function index()
    {
        return view('tickets.index');
    }

    public function store()
    {
        return view('tickets.show');
    }

    public function create()
    {
        return view('tickets.new');
    }

    public function edit($id)
    {
        return view('tickets.edit');
    }

    public function update($id)
    {
        return view('tickets.show');
    }

    public function show($id)
    {
        return view('tickets.show');
    }

    public function destroy($id)
    {
        return view('tickets.index');
    }

    public function pool()
    {
        $tickets = Ticket::all();
        return view('tickets.pool', [ 'user' => Auth::user(), 'tickets' => $tickets ]);
    }
}
