@extends('layouts.home')

@section('form_content')
    <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            {{ Form::label('name', $customer->name, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Phone Number</label>
        <div class="col-md-6">
            {{ Form::label('email', $customer->phone_number, ['class' => 'form-control']) }}
        </div>
    </div>

    @unless(empty($customer->twitter_id))
        <div class="form-group">
            {!! Form::label('twitter_id', 'Twitter ID', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {{ Form::label('twitter_id', $customer->twitter_id, ['class' => 'form-control']) }}
            </div>
        </div>
    @endunless

    @unless(empty($customer->notes))
        <div class="form-group">
            {!! Form::label('notes', 'Notes', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {{ Form::label('date_of_birth', $customer->notes, ['class' => 'form-control']) }}
            </div>
        </div>
    @endunless
@endsection

@section('content')
    <div class="margin-top container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Show Customer</div>
                    <div class="panel-body">
                        {{ Form::model($customer, array('class' => "form-horizontal", 'method' => 'POST', 'route' => array('customer.edit', $customer->id))) }}
                        @yield('form_content')
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-user"></i>Edit
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection