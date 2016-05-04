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
            return Redirect::route('customers.show', $customer);
        } else {
            // redirect
            Flash::error($customer->getErrors());
            return Redirect::back();
        }
    }

    public function update($customer)
    {
        $custom = Customer::findBySlug($customer);
        if (is_null($custom)) {
            Flash::error('No such Customer');
            return Redirect::back();
        }
        // process
        if ($custom->update(Input::all())) {
            // redirect
            $customer = $custom->slug ? $custom->slug : $customer;
            Flash::success('Successfully updated a Customer!');
            return Redirect::route('customers.show', $customer);
        } else {
            // redirect
            Flash::error($custom->getErrors());
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($customer)
    {
        $custom = Customer::findBySlug($customer);
        if (is_null($custom)) {
            Flash::error('No such Customer');
            return Redirect::to('home');
        }
        return view('customers.show', ['customer' => $custom]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($customer)
    {
        $custom = Customer::findBySlug($customer);
        if (is_null($custom)) {
            Flash::error('No such Customer');
            return Redirect::to('home');
        }
        return view('customers.edit', ['customer' => $custom]);
    }
}
