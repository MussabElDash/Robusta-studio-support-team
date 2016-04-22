@extends('layouts.home')

@section('content')
    <h1>Edit Customer</h1>
    {{ Form::model($customer, array('method' => 'PATCH', 'route' => array('customer.update', $customer->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::label('phone_number', 'Phone Number:') }}
            {{ Form::text('phone_number') }}
        </li>
        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::text('notes') }}
        </li>
        <li>
            {{ Form::label('twitter_id', 'Twitter Id:') }}
            {{ Form::text('twitter_id') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
            {{ link_to_route('customer.show', 'Cancel', $customer->id, array('class' => 'btn')) }}
        </li>
    </ul>
    {{ Form::close() }}

    @if ($errors->any())
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    @endif
@endsection