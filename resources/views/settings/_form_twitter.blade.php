<!-- Can be used for edit - create -->
{!! Form::model(null, ['route' => 'home.twitter', 'class' => 'form-horizontal']) !!}
<div class="box-body">

    <div class="form-group">
        {!! Form::label('Consumer key', 'Consumer key', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TWITTER_CONSUMER_KEY', null, ['class' => 'form-control', 'placeholder' => 'Consumer key']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Consumer secret', 'Consumer secret', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TWITTER_CONSUMER_SECRET', null, ['class' => 'form-control', 'placeholder' => 'Consumer secret']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Access token', 'Access token', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TWITTER_ACCESS_TOKEN', null, ['class' => 'form-control', 'placeholder' => 'Access token']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Access token secret', 'Access token secret', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('TWITTER_ACCESS_TOKEN_SECRET', null, ['class' => 'form-control', 'placeholder' => 'Access token secret']) !!}
        </div>
    </div>
</div>

<div class="box-footer">
    {!! Form::submit('Submit', [ 'class' => 'btn btn-success pull-right']) !!}
</div>
{!! Form::close() !!}