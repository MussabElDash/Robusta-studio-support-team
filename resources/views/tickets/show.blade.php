{{--*/ $comments = $ticket->comments/*--}}
@if($comments->count()>0)
    {{--*/ $comment_text = $comments->last()->body/*--}}
    {{--*/ $commenter_name = $comments->last()->user->name/*--}}
    {{--*/ $commenter_image = $comments->last()->user->profile_image_path/*--}}
    {{--*/ $last_status_id = $comments->last()->status_id/*--}}

@else
    {{--*/ $comment_text = $ticket->description/*--}}
    {{--*/ $commenter_name = $ticket->customer->name/*--}}
    {{--*/ $commenter_image = $ticket->customer->profile_image_path/*--}}
    {{--*/ $last_status_id = $ticket->tweet_id/*--}}
@endif
<div class="col-lg-4  col-md-4  col-sm-4 ">
    <div class="box box-success">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>
            <a href="ticket.html"><h3 class="box-title">{{$ticket->name}}</h3></a>
            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    <button class="btn btn-success btn-sm" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="box-body chat" id="chat-box-workspace" style="height: auto;">
            <!-- chat item -->
            <div class="item">
                <img alt="user image" class="online" src={{$commenter_image}}>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        <span class="name">{{$commenter_name}}</span>
                    </a>
                <p class="comment">
                    {{$comment_text}}
                </p>
                </p>
            </div>
        </div>
        <!-- /.chat -->
        <div class="box-footer">
            {!! Form::open(['route' => ['tickets.comment.store', 'id' => $ticket->id ], 'method' => 'post', "class" => "comment-form"]) !!}
            {!! Form::hidden('last_status_id',$last_status_id,array('id'=>'last_status_id')) !!}
            {!! Form::hidden('commenter_name',$user->name,array('id'=>'commenter_name')) !!}
            {!! Form::hidden('commenter_image',$user->profile_image_path,array('id'=>'commenter_image')) !!}
            <div class="input-group">
                {!! Form::text('body', null, ['class' => 'form-control ', 'placeholder' => "Press enter to post comment"]) !!}
                <div class="input-group-btn">
                    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>