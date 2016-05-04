<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Models\Ticket;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

use DB;
use Log;

class TicketsController extends Controller
{

    function __construct()
    {
        parent::__construct();
        DB::enableQueryLog();
    }

    // CRUD
    public function index()
    {
        $tickets = $this->user->tickets()->with('assigned_to', 'department',
            'creator', 'labels', 'priority')->get();
        return view('tickets.index', ['tickets' => $tickets]);
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
        $ticket = Ticket::with('assigned_to', 'department', 'labels', 'priority')->find($id);

        Log::info(DB::getQueryLog());
        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.edit_modal', ["ticket" => $ticket])->render(), 'id' => $ticket->id]);
        }
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if ($ticket->update($request->all())) {
            if ($request->ajax()) {
                return Response::json(["html" => view('tickets._ticket_pool',
                    ["ticket" => $ticket, "closed" => false])->render(), "id" => $id]);
            }

            return view('tickets.show', []);
        } else {

        }

    }

    public function show(Request $request, $id)
    {
        $ticket = Ticket::with('department',
            'creator', 'labels', 'priority', 'comments.user')->find($id);
        Log::info(DB::getQueryLog());
        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.show_modal', ["ticket" => $ticket,"closed"=>!$ticket->open])->render(), 'id' => $ticket->id]);
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
        if ($this->user->hasRole(["Admin"])) {
            $tickets = Ticket::notAssigned()->with(['labels', 'priority'])->paginate(5);
        } else {
            $tickets = Ticket::notAssigned()->ofDepartment($this->user->department_id)->with(['labels', 'priority'])->paginate(10);
        }

        if ($request->ajax()) {
            return Response::json(view('tickets._tickets_pool', ['tickets' => $tickets, 'closed' => false])->render());
        }
        return view('tickets.pool', ['tickets' => $tickets,'closed' => false]);
    }

    public function claim(Request $request, $id)
    {

        if ($this->user->canClaim()) {
            $ticket = Ticket::find($id);
            if ($ticket->canBeClaimed()) {
                $ticket->assigned_to()->associate($this->user);
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

    public function from_feed(Request $request)
    {
        $twitter_id = Input::get('customer_twitter_id');
        $customer = DB::table('customers')->where('twitter_id', $twitter_id)->first();
        if ($customer == null) {
            $customer = new Customer();
            $customer->twitter_id = $twitter_id;
            $customer->name = Input::get('customer_name');
            $customer->profile_image_path = Input::get('customer_profile_image_path');
            $customer->save();
        }
        $ticket = new Ticket();
        $ticket->name = Input::get('name');
        $ticket->description = Input::get('tweet_text');
        if (Input::get('assigned_to') != -1)
            $ticket->assigned_to = Input::get('assigned_to');
        if (Input::get('department_id') != -1)
            $ticket->department_id = Input::get('department_id');
        $ticket->creator_id = $this->user->id;
        $ticket->customer_id = $customer->id;
        if (Input::get('priority_id') != -1)
            $ticket->priority_id = Input::get('priority_id');
        $ticket->tweet_id = Input::get('tweet_id');
        $ticket->save();
        $labels = array_filter(Input::get('label'), function ($id) {
            return $id !== '-1';
        });

        if (count($labels) > 0)
            $ticket->labels()->attach($labels);
        return Response::json(["success" => true]);

    }

    public function toggle_status(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->assigned_to == $this->user->id) {
            $ticket->open = !$ticket->open;

            $flag = $ticket->update();

            if ($request->ajax()) {
                return Response::json(["success" => $flag]);
            }

            return redirect()->back();
        }

        if ($request->ajax()) {
            return Response::json(["message" => "Not Authorized"], 401);
        }
    }

    public function toggle_vip( Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->assigned_to == $this->user->id ||
            $this->user->hasRole(['Admin']) ||
            $this->user->department_id == $ticket->department_id) {
            $ticket->vip = !$ticket->vip;

            $flag = $ticket->update();

            if ($request->ajax()) {
                return Response::json(["success" => $flag]);
            }

            return redirect()->back();
        }
    }
}
