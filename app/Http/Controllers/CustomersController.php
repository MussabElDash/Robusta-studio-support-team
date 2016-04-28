<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\Customer;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;

class CustomersController extends Controller
{
    // validate

    protected static $rules = [
        'name' => 'required',
        'phone_number' => 'required',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->rules);
        // process
        if ($validator->fails()) {
            // redirect
            Session::flash('message', 'Error While creating Customer!');
            return Redirect::to('home');
        } else {
            // store
            $customer = new Customer;
            $customer->name = Input::get('name');
            $customer->notes = Input::get('notes');
            $customer->phone_number = Input::get('phone_number');
            if (!$customer->save()) {
                return 'Error';
            }

            // redirect
            Session::flash('message', 'Successfully created Customer!');
            return Redirect::action('CustomersController@show', $customer);
        }
    }

    public function update($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return 'Error';
        }
        $validator = Validator::make(Input::all(), $this->rules);
        // process
        if ($validator->fails()) {
            // redirect
            Session::flash('message', 'Error While creating Customer!');
            return Redirect::to('home');
        } else {
            // store
            $customer->name = Input::get('name');
            $customer->notes = Input::get('notes');
            $customer->phone_number = Input::get('phone_number');
            if (!$customer->save()) {
                return 'Error';
            }

            // redirect
            Session::flash('message', 'Successfully created Customer!');
            return Redirect::action('CustomersController@show', $customer);
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
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return 'Error';
        }
        return view('customers.show', ['user' => Auth::user(), 'customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return 'Error';
        }
        return view('customers.edit', ['user' => Auth::user(), 'customer' => $customer]);
    }
}
