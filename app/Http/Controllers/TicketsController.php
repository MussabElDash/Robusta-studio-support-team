<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketsController extends Controller
{
    // CRUD
    public function index()
    {
        return view('tickets.index');
    }

    public function store()
    {
        return view('tickets.show');
    }

    public function create()
    {
        return view('tickets.new');
    }

    public function edit($id)
    {
        return view('tickets.edit');
    }

    public function update($id)
    {
        return view('tickets.show');
    }

    public function show($id)
    {
        return view('tickets.show');
    }

    public function destroy($id)
    {
        return view('tickets.index');
    }

    public function pool()
    {
        return view('tickets.pool');
    }
}
