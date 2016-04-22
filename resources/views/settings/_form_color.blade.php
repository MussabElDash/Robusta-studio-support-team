<!-- Can be used for edit - create -->
{!! Form::open(array('action' => 'HomeController@store','class' => 'form-horizontal')) !!}
<div class="box-body">
    @for ($i = 1; $i < 17; $i++)
        {{ Setting::get("COLOR_".$i."_DESCRIPTION")}}
        <div id="cp{{$i}}" class="input-group colorpicker-component">
            {!! Form::text('color_'.$i, Setting::get('color_'.$i), ['class' => 'form-control']) !!}
            <span class="input-group-addon"><i></i></span>
        </div>
        <script>
            $(function () {
                $('#cp{{$i}}').colorpicker();
            });
        </script>
    @endfor
</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}