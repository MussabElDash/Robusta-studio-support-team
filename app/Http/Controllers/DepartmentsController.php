<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Flash;
use Session;
use Redirect;
use Auth;
use Log;
use Response;
use Helpers;
use App\Models\User;

class DepartmentsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departments.index', ['departments' => $this->departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = Department::create(Input::all());
        if ($department->save()) {
            Flash::success('Successfully created department');
            $response = array(
                'success' => true,
                'status' => 'success',
                'slug' => $department->slug,
                'msg' => 'department created successfully!',
            );
            return Response::json($response, 200);
        } else {
            $response = array(
                'success' => false,
                'status' => 'error',
                'errors' => $department->getErrors(),
                'msg' => 'Error While creating department!',
            );
            return Response::json($response, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $department = Department::where('slug', $slug)->first();
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $department = Department::where('slug', $slug)->first();
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $department = Department::where('slug', $slug)->first();
        if ($department->update(Input::all())) {
            $slug = $department->slug ? $department->slug : $slug;
            Flash::success('Successfully updated the department');
            return Redirect::route("departments.show", [$slug]);
        } else {
            Flash::error($department->getErrors());
            return Redirect::back()->with('errors', $department->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function freeAgents(Request $request, $id)
    {
        if ($request->ajax()) {
            $response = array(
                'success' => true,
                'status' => 'success',
                'agents' => User::freeAgents($id)->get()->lists('name','id')->toArray()
            );
            return Response::json($response, 200);
        }else{
            error_log('NOT AJAX');
        }
    }
    public function freeSupervisors(Request $request){
        if ($request->ajax()) {
            $response = array(
                'success' => true,
                'status' => 'success',
                'supervisors' => User::freeSupervisors()->get()->lists('name','id')->toArray()
            );
            return Response::json($response, 200);
        }else{
            error_log('NOT AJAX');
        }
    }
}
