<!-- Can be used for edit - create -->

{{--*/ $flag = isset($ticket) && isset($autoFill) && $autoFill /*--}}
{{--*/ $form_object = $flag ? $ticket : null /*--}}
{{--*/ $form_route  = $flag ? ['tickets.update', 'id' => $ticket->id]: 'tickets.store' /*--}}
{{--*/ $form_method = $flag ? 'put': 'post' /*--}}
{{--*/ $form_id     = $flag ? 'ticket-form-' . $ticket->id : '' /*--}}


{!! Form::model( $form_object, ['route' => $form_route,
 'method' => $form_method, 'id' => $form_id, 'class' => 'form-horizontal']) !!}
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
        {!! Form::label('department_id', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', DB::table('departments')->lists('name','id'), '2', ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}