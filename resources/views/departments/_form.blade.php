<!-- Can be used for edit - create -->
{!! Form::model(null, ['route' => 'departments.store', 'class' => 'form-horizontal']) !!}
  <div class="box-body">

    <div class="form-group">
      {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Description']) !!}
      </div>
    </div>

  </div>

  <div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
  </div>
{!! Form::close() !!}
