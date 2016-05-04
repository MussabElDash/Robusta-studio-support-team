<!-- Can be used for edit - create -->
{!! Form::open(['route' =>  'departments.store','method' => 'post', 'class' => 'form-horizontal','id'=>'form-add-department']) !!}

<div class="box-body">
    <div id="nameError" style="display: none" class="alert alert-danger"></div>
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, [
                'class' => 'form-control has-warning error',
                'placeholder' => 'Name',
                'id' => 'department-name',
                'required' => true,
            ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Head', 'Head', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('user_id', array(""=>'Please select a supervisor'), null, ['class' => 'form-control','id'=>'supervisor_select']) }}
        </div>
    </div>



    <div id="descriptionError" style="display: none" class="alert alert-danger"></div>
    <div class="form-group">
        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">

            {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'rows' => '3',
                'placeholder' => 'Description',
                'id' => 'department-description'
            ]) !!}
        </div>
    </div>

</div>

<div class="box-footer">
    {!! Form::submit('Submit', [
        'class' => 'btn btn-success pull-right'
        ]) !!}
</div>
{!! Form::close() !!}

