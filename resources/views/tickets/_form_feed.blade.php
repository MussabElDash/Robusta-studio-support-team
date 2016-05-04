<!-- Can be used for edit - create -->
{!! Form::model( null, ['route' =>  'tickets.feed','method' => 'post', 'class' => 'form-horizontal feed']) !!}
<div class="box-body">
    {!! Form::hidden('customer_twitter_id','',array('id' => 'customer_twitter_id')) !!}
    {!! Form::hidden('customer_name','',array('id' => 'customer_name')) !!}
    {!! Form::hidden('customer_profile_image_path','',array('id' => 'customer_profile_image_path')) !!}
    {!! Form::hidden('tweet_text','',array('id' => 'tweet_text')) !!}
    {!! Form::hidden('tweet_id','',array('id' => 'tweet_id')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Title', ['class' => 'col-sm-2 control-label','required' => 'required']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ticket title']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', $departments, '-1', ['class' => 'form-control','id'=>'department_select_free_agents']) }}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('priority', 'Priority', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('priority_id', $priorities, '-1', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('agent', 'Agent', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('assigned_to', array(-1=>'Please select a department to load free agents'), '-1', ['class' => 'form-control','id'=>'agent_select']) }}
        </div>
    </div>
    <div class="form-group" id="dynamic-fields">
        {!! Form::label('labels', 'Labels', ['class' => 'col-sm-12 control-label']) !!}
        <div class="entry input-group col-sm-12">
            {{--*/ $labels = array(-1=>'Select label')+DB::table('labels')->lists('name','id') /*--}}
            {{ Form::select('label[]', $labels,-1, ['class' => 'form-control']) }}
            <span class="input-group-btn">
                <button class="btn btn-success btn-add" type="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </span>
        </div>
    </div>
</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'type'=>'button','class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}