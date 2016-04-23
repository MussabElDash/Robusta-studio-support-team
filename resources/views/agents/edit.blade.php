@extends('layouts.home')

@section('content')
    <h1>Edit Agent</h1>
    {{ Form::model($agent, array('method' => 'PATCH', 'route' => array('agent.update', $agent->id))) }}
    <ul>
        <li>
            {{ Form::label('Name:') }}
            {{ Form::text('name') }}
        </li>
        @if($user->role === 'Admin')
            <li>
                {{ Form::label('Email:') }}
                {{ Form::text('email') }}
            </li>
            <li>
                {{ Form::label('Role:') }}
                {{ Form::text('role') }}
            </li>
        @endif
        <li>
            {{ Form::label('Gender:') }}
            {{ Form::select('gender', ['Select', 'Female', 'Male'], '0') }}
        </li>
        <li>
            {{ Form::label('Date Of Birth:') }}
            {{ Form::text('date_of_birth') }}
        </li>
        @if($user->role === 'Admin')
            <li>
                {{ Form::label('Department:') }}
                {{ Form::text('department_id') }}
            </li>
        @endif
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
            {{ link_to_route('agent.show', 'Cancel', $agent->id, array('class' => 'btn')) }}
        </li>
    </ul>
    {{ Form::close() }}

    @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    @endif
@endsection