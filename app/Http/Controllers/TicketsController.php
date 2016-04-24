<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Models\Ticket;
use Illuminate\Support\Facades\Response;

use DB;

class TicketsController extends Controller
{

    function __construct()
    {
        DB::enableQueryLog();
    }

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
        $success = Ticket::destroy($id);

        if ($request->ajax()) {
            $response = ['success' => $success];
            return Response::json($response);
        }
    }

    public function pool(Request $request)
    {
        $tickets = Ticket::with(['labels', 'priority', 'department'])->paginate(5);

        if ($request->ajax()) {
            return Response::json(view('tickets._tickets_pool', ['tickets' => $tickets])->render());
        }
        return view('tickets.pool', ['user' => Auth::user(), 'tickets' => $tickets]);
    }

    public function claim($id)
    {

    }
}
