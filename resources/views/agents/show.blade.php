@extends('layouts.home')

@section('content')
    <h1>Show Agent</h1>
    {{ Form::model($agent, array('method' => 'POST', 'route' => array('agent.edit', $agent->id))) }}
    <ul>
        <li>
            {{ Form::label('Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::label('Email:') }}
            {{ Form::text('email') }}
        </li>
        <li>
            {{ Form::label('Role:') }}
            {{ Form::text('role') }}
        </li>
        @unless(is_null($agent->gender))
            <li>
                {{ Form::label('Gender:') }}
                {{ Form::select('gender', ['Select', 'Female', 'Male']) }}
            </li>
        @endunless
        @unless(is_null($agent->date_of_birth))
            <li>
                {{ Form::label('Date Of Birth:') }}
                {{ Form::text('date_of_birth') }}
            </li>
        @endunless
        @unless(is_null($agent->department_id))
            <li>
                {{ Form::label('Department:') }}
                {{ Form::text('department_id') }}
            </li>
        @endunless
        <li>
            {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
        </li>
    </ul>
    {{ Form::close() }}
@endsection