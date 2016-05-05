<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

use App\Models\Label;

use Log;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $label = Label::all();
        return view('labels.index', ['labels' => $label]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $label = Label::create($request->all());

        $response = [
            'success' => true
        ];
        $status = 200;
        Log::debug($label);
        if ($label->id == null) {
            $response["success"] = false;
            $response["errors"] = $label->getErrors();
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
        $label = Label::find($id);

        if ( $request->ajax() ){
            return Response::json(['html' => view('shared.modals.basic_modal', ['label' => $label, 'autoFill' => true, 'id' => 'edit-label-index-modal-' . $id,
                'body' => 'labels._form', 'title' => 'Edit Label'])->render(), 'id' => $id] );
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
        $label = Label::find($id);
        $response = [
            'success' => true,
            'id' => $id
        ];
        $status = 200;

        if (!$label->update($request->all())){
            $response["success"] = false;
            $response["errors"] = $label->getErrors();
            $status = 400;
        } else {
            $response["html"] = view('labels._label_index', ['label' => $label])->render();
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
        if (Label::destroy($id)) {
            return Response::json(["success" => true, 'id' => $id]);
        }
        return Response::json(["success" => false], 500);
    }
}
