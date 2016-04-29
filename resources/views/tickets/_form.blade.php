<!-- Can be used for edit - create -->
{!! Form::model(isset($ticket) ? $ticket : null, ['route' => isset($ticket) ? ['tickets.update', 'id' => $ticket->id]: 'tickets.store',
 'method' => isset($ticket) ? 'put': 'post', 'id' => isset($ticket) ? 'ticket-form-' . $ticket->id : '', 'class' => 'form-horizontal']) !!}
<div class="box-body">

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Phone number or twitter handle']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Problem', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Problem Description', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', DB::table('departments')->lists('name','id'), '2', ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}