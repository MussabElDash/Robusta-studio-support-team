<!-- Can be used for edit - create -->
{!! Form::model($agent, ['method' => 'delete', 'route' => ['agents.destroy', $agent->slug], 'class' => 'form-horizontal']) !!}
<div class="box-body">

    Are you sure you want to delete this Agent ?

    <div class="box-footer">
        {!! Form::submit('Fire!', [ 'class' => 'btn btn-danger pull-right', 'style' => 'margin-left:10px;']) !!}
        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal" id="frm_cancel">No</button>
    </div>

</div>
{!! Form::close() !!}
