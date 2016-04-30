@extends('layouts.home')

@section('breadcrumb')
    Agents
@endsection

@section('breadcrumb1')
    {{$agent->name}}
@endsection

@section('content')
    <div class="margin-top content">
        <div class="row">
            <div class="col-xs-8 col-md-8 col-lg-8 col-xs-offset-2 col-md-offset-2 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Agent</div>
                    <div class="panel-body">
                        {{ Form::model($agent, array('class' => "form-horizontal", 'method' => 'PATCH', 'route' => array('agents.update', $agent->slug))) }}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                {{ Form::text('name', $agent->name, ['class' => 'form-control']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($user->role === 'Admin')
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    {{ Form::text('email', $agent->email, ['class' => 'form-control']) }}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                {{ Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-6">
                                    {{ Form::select('role', ['Admin' => 'Admin', 'Supervisor' => 'Supervisor', 'Agent' => 'Support agent'], $agent->role, ['class' => 'form-control']) }}

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                                {!! Form::label('department_id', 'Department ID', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {{ Form::select('department_id', $agent_departments, $agent->department_id, ['class' => 'form-control']) }}

                                    @if ($errors->has('department_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::select('gender', ['Select', 'Female', 'Male'], $agent->gender, ['class' => 'form-control']) }}

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {{ Form::text('date_of_birth', $agent->date_of_birth, ['class' => 'form-control']) }}

                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ link_to_route('agents.show', 'Cancel', $agent->slug, array('class' => 'btn pull-right')) }}
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
    <script type="text/javascript">
        $(function () {
            $("#date_of_birth").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection