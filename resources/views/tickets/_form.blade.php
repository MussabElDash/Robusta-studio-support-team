<!-- Can be used for edit - create -->
{!! Form::model(null, ['route' => 'ticket.store', 'class' => 'form-horizontal']) !!}
  <div class="box-body">

    <div class="form-group">
      {!! Form::label('customer_name', 'Customer', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('customer_name', null, ['class' => 'form-control', 'placeholder' => 'Phone number or twitter handle']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('problem_description', 'Problem', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('problem_description', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Problem Description', 'required' => 'required']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {{ Form::select('color', ['Payments', 'Subscribtions', 'DSL Plus', 'Technical Support'], '2', ['class' => 'form-control']) }}
      </div>
    </div>
  </div>

  <div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
  </div>
{!! Form::close() !!}