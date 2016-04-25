<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Session;
use Redirect;
use Auth;
use Log;
use Response;

class DepartmentsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $tweets = array()
        $departments = Department::all();
        return view('departments.index', ['user' => Auth::user(), 'departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("Creating dep ... \n".implode(",", Input::all()));
        $department = Department::create(Input::all());
        $department->save();
        if( !empty( $department->errors ) ){
            $response = array(
                            'status' => 'error',
                            'msg' => 'Error While creating department!',
                        );
        }else {
            $response = array(
                            'status' => 'success',
                            'msg' => 'department created successfully!',
                        );
        }
        return Response::json( $response );
        // return Redirect::back()->with('message', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        Log::info('dep slug: '.$slug);
        $departments = Department::all();
        $department = Department::where('slug', $slug)->first();
        return view('departments.show', ['user' => Auth::user(), 'departments' => $departments, 'department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $departments = Department::all();
        $department = Department::where('slug', $slug)->first();
        return view('departments.edit', ['user' => Auth::user(), 'departments' => $departments, 'department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        Log::info("updating dep ... \n".implode(",", Input::all()));

        $department = Department::where('slug', $slug)->first();
        $department->name = Input::get('name');
        $department->description = Input::get('description');
        $department->save();

        $departments = Department::all();
        return view('departments.show', ['user' => Auth::user(), 'departments' => $departments, 'department' => $department]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
