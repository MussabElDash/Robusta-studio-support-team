<!-- Can be used for edit - create -->

{{--*/ $flag = isset($label) && isset($autoFill) && $autoFill /*--}}
{{--*/ $form_object = $flag ? $label : null /*--}}
{{--*/ $form_route  = $flag ? ['labels.update', 'id' => $label->id]: 'labels.store' /*--}}
{{--*/ $form_method = $flag ? 'put': 'post' /*--}}
{{--*/ $form_id = $flag ? 'edit-label-index-form-id' . $label->id : '' /*--}}

{!! Form::model($form_object, ['route' => $form_route, 'method' => $form_method, 'id' => $form_id, 'class' => 'form-horizontal']) !!}
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
                $('.colorpicker-component').colorpicker();
            });
        </script>
    </div>

    <div class="form-group">
        {!! Form::label('name_color', 'Text Color', ['class' => 'col-sm-2 control-label']) !!}
        <div id="name_color" class="col-sm-10 input-group colorpicker-component">
            {!! Form::text('name_color', null, ['class' => 'form-control', 'style' => 'margin-left: 15px;width: 97%']) !!}
            <span class="input-group-addon"><i></i></span>
        </div>
    </div>

</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}