<!-- Can be used for edit - create -->
{!! Form::model(null, ['route' => 'agents.store', 'class' => 'form-horizontal']) !!}
<div class="box-body">

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Role', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('role', ['Admin' => 'Admin', 'Supervisor' => 'Supervisor', 'Agent' => 'Support agent'], 'Agent', ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', $departments, null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::file('image') }}
        </div>
    </div>

    <div class="box-footer">
        {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
    </div>

</div>
{!! Form::close() !!}
