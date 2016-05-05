<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

use Log;
use Flash;

class PrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::all();
        return view('priorities.index', ['priorities' => $priorities]);
    }

    public function store(Request $request)
    {
        $priority = Priority::create($request->all());

        $response = [
            'success' => true
        ];
        $status = 200;

        if ($priority->id == null) {
            $response["success"] = false;
            $response["errors"] = $priority->getErrors();
            $status = 400;
        }

        return Response::json($response, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $priority = Priority::find($id);

        if ( $request->ajax() ){
            return Response::json(['html' => view('shared.modals.basic_modal', ['priority' => $priority, 'autoFill' => true, 'id' => 'edit-priority-index-modal-' . $id,
                    'body' => 'priorities._form', 'title' => 'Edit Priority'])->render(), 'id' => $id] );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $priority = Priority::find($id);
        $response = [
            'success' => true,
            'id' => $id
        ];
        $status = 200;

        if (!$priority->update($request->all())){
            $response["success"] = false;
            $response["errors"] = $priority->getErrors();
            $status = 400;
        } else {
            $response["html"] = view('priorities._priority_index', ['priority' => $priority])->render();
        }

        return Response::json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Priority::destroy($id)) {
            return Response::json(["success" => true, 'id' => $id]);
        }
        return Response::json(["success" => false], 500);
    }
}
