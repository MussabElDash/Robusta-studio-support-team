<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Customer;
use Auth;
use Flash;
use Input;
use Log;
use Redirect;
use Session;

class CustomersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store()
    {
        $customer = new Customer(Input::all());
        // process
        if ($customer->save()) {
            // redirect
            Flash::success('Successfully created a Customer!');
            return Redirect::route('customer.show', $customer);
        } else {
            // redirect
            Flash::error($customer->getErrors());
            return Redirect::back();
        }
    }

    public function update($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            Flash::error('No such Customer');
            return Redirect::back();
        }
        // process
        if ($customer->update(Input::all())) {
            // redirect
            Flash::success('Successfully updated a Customer!');
            return Redirect::route('customer.show', $id);
        } else {
            // redirect
            Flash::error($customer->getErrors());
            return Redirect::back()->with('errors', $customer->getErrors());
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
            Flash::error('No such Customer');
            return Redirect::to('home');
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
            Flash::error('No such Customer');
            return Redirect::to('home');
        }
        return view('customers.edit', ['user' => Auth::user(), 'customer' => $customer]);
    }
}
