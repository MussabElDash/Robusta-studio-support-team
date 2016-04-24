<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Models\Ticket;
use Illuminate\Support\Facades\Response;

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

    public function destroy(Request $request, $id)
    {

        if ($request->ajax()) {
            $response = ['success' => true];
            return Response::json($response);
        }
    }

    public function pool()
    {
        $tickets = Ticket::all();
        return view('tickets.pool', ['user' => Auth::user(), 'tickets' => $tickets]);
    }

    public function claim($id)
    {

    }
}
