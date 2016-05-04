<!-- Can be used for edit - create -->
{!! Form::model(null, ['route' => 'priorities.store', 'class' => 'form-horizontal']) !!}
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

    <div class="form-group">
        {!! Form::label('background_color', 'Background Color', ['class' => 'col-sm-2 control-label']) !!}
        <div id="background_color" class="col-sm-10 input-group colorpicker-component">
            {!! Form::text('background_color', null, ['class' => 'form-control', 'style' => 'margin-left: 15px;width: 97%']) !!}
            <span class="input-group-addon"><i></i></span>
        </div>
        <script>
            $(function () {
                $('#background_color').colorpicker();
            });
        </script>
    </div>

    <div class="form-group">
        {!! Form::label('name_color', 'Text Color', ['class' => 'col-sm-2 control-label']) !!}
        <div id="name_color" class="col-sm-10 input-group colorpicker-component">
            {!! Form::text('name_color', null, ['class' => 'form-control', 'style' => 'margin-left: 15px;width: 97%']) !!}
            <span class="input-group-addon"><i></i></span>
        </div>
        <script>
            $(function () {
                $('#name_color').colorpicker();
            });
        </script>
    </div>


    <div class="form-group">
        {!! Form::label('value', 'Priority in numbers', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Higher number, more important'])!!}
        </div>
    </div>

</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}