@extends('layouts.home')

@section('content')
    <div class="margin-top container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Show Agent</div>
                    <div class="panel-body">
                        {{ Form::model($agent, array('class' => "form-horizontal", 'method' => 'POST', 'route' => array('agent.edit', $agent->id))) }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                {{ Form::label('name', $agent->name, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                {{ Form::label('email', $agent->email, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::label('role', $agent->role, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('department_id', 'Department ID', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::label('department_id', $agent->department_id, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::label('gender', $agent->gender, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::label('date_of_birth', $agent->date_of_birth, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-user"></i>Update
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