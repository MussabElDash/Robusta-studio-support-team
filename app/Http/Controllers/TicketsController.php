<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\User as UserModel;
use Auth;
use Carbon\Carbon;
use DB;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Events\TicketAssigned;

use Log;
use Event;

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
//        $tickets = Ticket::with('assigned_to', 'department',
//            'creator', 'labels', 'priority')->get();
        $tickets = Ticket::paginate(5);
        return view('tickets.index', ['tickets' => $tickets, 'closed' => false]);
    }

    public function store()
    {
        $customer = Customer::where(['phone_number' => Input::get('phone_number')])->first();
        Log::debug($customer);
        if (is_null($customer)) {
            $customer = new Customer();
            $customer->phone_number = Input::get('phone_number');
            $customer->name = Input::get('customer_name');
            $customer->save();
        }
        Log::debug($customer->attributes);
        $ticket = new Ticket(Input::all());
        $ticket->creator_id = $this->user->id;
        $ticket->assigned_to = $this->user->id;
        $ticket->customer_id = $customer->id;
        $ticket->department_id = $this->user->department_id;
        $ticket->tweet_id = Carbon::now() . $this->user->id;
        if ($ticket->save()) {
            Flash::success('Successfully created a Ticket!');
            return Redirect::route('agents.workspace');
        } else {
            Flash::error($ticket->getErrors());
            return Redirect::back();
        }
    }

    public function create()
    {

        return view('tickets.new');
    }

    public function edit(Request $request, $id)
    {
        $ticket = Ticket::with('assigned_to', 'department', 'labels', 'priority')->find($id);


        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.edit_modal', ["ticket" => $ticket,
                'agents' => ($ticket->department) ?
                    array('' => 'Please select a department to load free agents') +
                    UserModel::freeAgents($ticket->department->id)->get()->lists('name', 'id')->toArray()
                    :
                    array('' => 'Please select a department to load free agents')])->render(),
                'id' => $ticket->id]);
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
        if ($request->ajax()) {
            return Response::json(['html' => view('tickets.show_modal', ["ticket" => $ticket, "closed" => !$ticket->open])->render(), 'id' => $ticket->id]);
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
        return view('tickets.pool', ['tickets' => $tickets, 'closed' => false]);
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
            Log::info("\n\n in \n\n");
            $customer = new Customer();
            $customer->twitter_id = $twitter_id;
            $customer->name = Input::get('customer_name');
            $customer->profile_image_path = Input::get('customer_profile_image_path');
            $customer->save();
        }
        $ticket = new Ticket(Input::all());
        $ticket->description = Input::get('tweet_text');
        $ticket->creator_id = $this->user->id;
        $ticket->customer_id = $customer->id;
        $ticket->tweet_id = Input::get('tweet_id');
        $ticket->save();
        $labels = array_filter(Input::get('label'), function ($id) {
            return !empty($id);
        });

        if (count($labels) > 0)
            $ticket->labels()->attach($labels);

        if (Input::get('assigned_to') != -1)
            $this->notify($this->user->id, $ticket);
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

    public function toggle_vip(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->assigned_to == $this->user->id ||
            $this->user->hasRole(['Admin']) ||
            $this->user->department_id == $ticket->department_id
        ) {
            $ticket->vip = !$ticket->vip;

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

    public function paypal(Request $request, $ticket_id)
    {
        return view('tickets.paypal', ['ticket' => $ticket_id, 'guest' => true]);

    }

    public function vip(Request $request)
    {
        $ticket = Ticket::find(Crypt::decrypt(Input::get('ticket')));
        $ticket->vip = true;
        if ($ticket->save()) {
            return Redirect::to('home');
        } else {
            return view('tickets.paypal', ['ticket' => $ticket->id, 'guest' => true]);
        }
    }

    public function notify($actor_id, $ticket) {
        Event::fire(new TicketAssigned($actor_id, $ticket->assigned_to, $ticket->id, 'tickets'));
    }
}
