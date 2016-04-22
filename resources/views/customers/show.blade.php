@extends('layouts.home')

@section('content')
    <h1>Show Customer</h1>
    {{ Form::model($customer, array('method' => 'POST', 'route' => array('customer.edit', $customer->id))) }}
    <ul>
        <li>
            {{ Form::label('Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::label('Phone Number:') }}
            {{ Form::text('phone_number') }}
        </li>
        @if ($customer->notes)
            <li>
                {{ Form::label('Notes:') }}
                {{ Form::text('notes') }}
            </li>
        @endif
        @if ($customer->twitter_id)
            <li>
                {{ Form::label('Twitter Id:') }}
                {{ Form::text('twitter_id') }}
            </li>
        @endif
        <li>
            {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
        </li>
    </ul>
    {{ Form::close() }}
@endsection