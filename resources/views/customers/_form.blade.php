@section('scripts')
    {!! Html::script('assets/js/jquery.inputmask.js') !!}
    {!! Html::script('assets/js/select2.full.min.js') !!}

    <script>
        $(function () {
            $("[data-mask]").inputmask();
        });
    </script>
@append

{!! Form::model(null, ['route' => 'customers.store', 'class' => 'form-horizontal']) !!}
<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>

    <!--     <div class="form-group">
      {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
              {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email'])!!}
            </div>
          </div>
       -->
    <div class="form-group">
        {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('phone_number', null, [
              'class' => 'form-control',
              'placeholder' => 'Phone Number',
              'data-inputmask' => '"mask": "(999) 999-9999"',
              'data-mask' => ''])
            !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('notes', 'Notes', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Notes']) !!}
        </div>
    </div>

</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}