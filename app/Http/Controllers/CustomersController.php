<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Input;
use Validator;
use Session;
use Redirect;
use App\Models\Customer;

class CustomersController extends Controller
{
    //
    // validate
    	protected $rules = [
            'name'       => 'required'
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
			$customer->save();

            // redirect
            Session::flash('message', 'Successfully created Customer!');
			return Redirect::to('home');
        }
    }
}
