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
        $current_user = Auth::user();
        $tickets = $current_user->tickets()->with('assigned_to', 'department',
            'creator', 'labels', 'priority')->get();
        return view('tickets.index', ['user' => $current_user, 'tickets' => $tickets]);
    }

    public function store()
    {

        return view('tickets.show');
    }

    public function create()
    {

        return view('tickets.new');
    }

    public function edit(Request $request, $id)
    {
        $ticket = Ticket::with('assigned_to', 'department',
            'creator', 'labels', 'priority', 'comments.owner')->find($id);

        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.edit_modal', ["ticket" => $ticket])->render(), 'id' => $ticket->id]);
        }
    }

    public function update(Request $request, $id)
    {
        $current_user = Auth::user();
        $ticket = Ticket::find($id);

        if ($ticket->update($request->all())) {
            if ($request->ajax()) {
                return Response::json(["html" => view('tickets._ticket_pool',
                    ["ticket" => $ticket, "user" => $current_user])->render(), "id" => $id]);
            }

            return view('tickets.show', []);
        } else {

        }

    }

    public function show(Request $request, $id)
    {
        $ticket = Ticket::with('assigned_to', 'department',
            'creator', 'labels', 'priority', 'comments.owner')->find($id);

        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.show_modal', ["ticket" => $ticket])->render(), 'id' => $ticket->id]);
        }
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
        $current_user = Auth::user();
        if ($current_user->hasRole(["Admin"])) {
            $tickets = Ticket::notAssigned()->with(['labels', 'priority'])->paginate(5);
        } else {
            $tickets = Ticket::notAssigned()->ofDepartment($current_user->department_id)->with(['labels', 'priority'])->paginate(10);
        }

        if ($request->ajax()) {
            return Response::json(view('tickets._tickets_pool', ['tickets' => $tickets])->render());
        }
        return view('tickets.pool', ['user' => $current_user, 'tickets' => $tickets]);
    }

    public function claim(Request $request, $id)
    {
        $current_user = Auth::user();

        if ($current_user->canClaim()) {
            $ticket = Ticket::find($id);
            if ($ticket->canBeClaimed()) {
                $ticket->assigned_to()->associate($current_user);
                if ($ticket->save()) {
                    if ($request->ajax()) {
                        return Response::json(["success" => true]);
                    }

                    return redirect()->to('tickets.index');
                }

            }
        }

        if ($request->ajax()) {
            return Response::json(["success" => false]);
        }

        return redirect()->to('tickets.index');
    }
}
