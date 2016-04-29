<!-- Can be used for edit - create -->
{!! Form::model(isset($ticket) ? $ticket : null, ['route' => isset($ticket) ? ['tickets.update', 'id' => $ticket->id]: 'tickets.feed',
 'method' => isset($ticket) ? 'put': 'post', 'id' => isset($ticket) ? 'ticket-form-' . $ticket->id : '', 'class' => 'form-horizontal feed']) !!}
<div class="box-body">
    {!! Form::hidden('customer_twitter_id','',array('id' => 'customer_twitter_id')) !!}
    {!! Form::hidden('customer_name','',array('id' => 'customer_name')) !!}
    {!! Form::hidden('customer_profile_image_path','',array('id' => 'customer_profile_image_path')) !!}
    {!! Form::hidden('tweet_text','',array('id' => 'tweet_text')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label','required' => 'required']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Phone number or twitter handle']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('department_id', DB::table('departments')->lists('name','id'), '2', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('priority', 'Priority', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {{ Form::select('priority_id', DB::table('priorities')->lists('name','id'), '1', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group" id ="dynamic-fields">
        {!! Form::label('labels', 'Labels', ['class' => 'col-sm-12 control-label']) !!}
        <div class="entry input-group col-sm-12">
            {{--*/ $labels = DB::table('labels')->lists('name','id') /*--}}
            {{ Form::select('label[]', $labels,1, ['class' => 'form-control']) }}
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