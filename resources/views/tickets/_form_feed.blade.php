<!-- Can be used for edit - create -->
{{--*/ $form_id     = $ticket ? 'ticket-form-' . $ticket->id : '' /*--}}

{!! Form::model($ticket, ['route' =>  $route,'method' => $method, 'class' => $class, 'id' => $form_id]) !!}
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
        {!! Form::label('department_id', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', $departments, null, ['class' => 'form-control department_select_free_agents']) }}

        </div>
    </div>
    <div class="form-group">
        {!! Form::label('priority', 'Priority', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('priority_id', $priorities, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('agent', 'Agent', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('assigned_to',$agents,null, ['class' => 'form-control agent_select']) }}

        </div>
    </div>
    <div class="form-group" id="dynamic-fields">
        {!! Form::label('labels', 'Labels', ['class' => 'col-sm-12 control-label']) !!}
        <div class="entry input-group col-sm-12">
            {{ Form::select('label[]', $labels, null, ['class' => 'form-control']) }}
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