@extends('agents.shared')

@section('form_content')
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
            {{ Form::label('department_id', $departments[$agent->department_id], ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {{ Form::label('gender', $agent->gender == 0 ? 'Not Defined' : ($agent->gender == 1 ? 'Female' : 'Male'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {{ Form::label('date_of_birth', $agent->date_of_birth, ['class' => 'form-control']) }}
        </div>
    </div>
@endsection

@section('content')
    <div class="margin-top content">
        <div class="row">
            <div class="col-xs-8 col-md-8 col-lg-8 col-xs-offset-2 col-md-offset-2 col-lg-offset-2">
                {{--*/ $canDelete = $user->hasRole(['Admin']) /*--}}
                {{--*/ $canDelete |= $user->hasRole(['Supervisor']) && $user->department == $agent-> department/*--}}
                {{--*/ $canDelete &= $user != $agent /*--}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Show Agent
                        @if($canDelete)
                            <a href="#" data-toggle="modal" data-target="#agent-confirm-delete"
                               class="badge label-danger pull-right"><span>Fire!</span></a>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if($agent->editable())
                            {{ Form::model($agent, array('class' => "form-horizontal", 'method' => 'POST', 'route' => array('agents.edit', $agent->slug))) }}
                            @yield('form_content')
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        <i class="fa fa-btn fa-user"></i>Edit
                                    </button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        @else
                            <div class="form-horizontal">
                                @yield('form_content')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @parent
    @include('shared.modals.basic_modal', ['id' => 'agent-confirm-delete', 'body' => 'agents._delete', 'title' => 'Agent delete'])
@endsection