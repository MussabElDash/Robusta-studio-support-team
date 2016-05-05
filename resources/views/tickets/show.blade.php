{{--*/ $comments = $ticket->comments()->orderBy('created_at', 'desc')->get(); /*--}}
@if($comments->count()>0)
    {{--*/ $comment_text = $comments->last()->body/*--}}
    {{--*/ $commenter_name = $comments->last()->user->name/*--}}
    {{--*/ $commenter_image = $comments->last()->user->profile_image_path/*--}}
@else
    {{--*/ $comment_text = $ticket->description/*--}}
    {{--*/ $commenter_name = $ticket->customer->name/*--}}
    {{--*/ $commenter_image = $ticket->customer->profile_image_path/*--}}
@endif
<div class="col-lg-4  col-md-4  col-sm-4" style="max-height: 400px; overflow: scroll;">
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
            @if($comments->count()>0)
                @foreach($comments as $comment)
                    {{--*/ $commenter_image = $comment->user->profile_image_path ? $comment->user->profile_image_path : "/assets/images/user2-160x160.jpg" /*--}}
                    <div class="item">
                        <img alt="user image" class="online" src={{$commenter_image}}>
                        <p class="message">
                            <a href="#" class="name">
                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
                                    @if (\Carbon\Carbon::createFromTimeStamp(strtotime($comment['created_at']))->diffInDays() > 30)
                                          {{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment['created_at']))->toFormattedDateString() }}
                                      @else
                                          {{\Carbon\Carbon::createFromTimeStamp(strtotime($comment['created_at']))->diffForHumans()}}
                                      @endif
                                </small>
                                <span class="name">{{$comment->user->name}}</span>
                            </a>
                        <p class="comment">
                            {{$comment->body}}
                        </p>
                        </p>
                    </div>
                @endforeach
            @endif
            {{--*/ $comment_text = $ticket->description/*--}}
            {{--*/ $commenter_name = $ticket->customer->name/*--}}
            {{--*/ $commenter_image = $ticket->customer->profile_image_path/*--}}
            <div class="item">
                <img alt="user image" class="online" src={{$commenter_image}}>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
                            @if (\Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->diffInDays() > 30)
                                      {{ \Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->toFormattedDateString() }}
                                  @else
                                      {{\Carbon\Carbon::createFromTimeStamp(strtotime($ticket['created_at']))->diffForHumans()}}
                                  @endif
                        </small>
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
            {!! Form::hidden('commenter_name',$user->name,array('id'=>'commenter_name')) !!}
            {!! Form::hidden('commenter_image',$user->profile_image_path,array('id'=>'commenter_image')) !!}
            <div class="input-group">
                {!! Form::text('body', null, ['class' => 'form-control ', 'placeholder' => "Press enter to post comment"]) !!}
                <div class="input-group-btn">
                    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            {!! Form::close() !!}

            {{--*/ $toggle_status_text = $ticket->open ? 'Mark as Done' : 'Open' /*--}}
            {{--*/ $toggle_vip_text = $ticket->vip ? 'Unmark as Vip' : 'Mark as Vip' /*--}}
            <div style="margin-top: 10px;">
                <span style="margin-left: 10px;">
                {!! Form::open(['route' => ['tickets.toggle_status', $ticket->id], 'method' => 'put']) !!}
                    {!! Form::submit($toggle_status_text, ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </span>
                <span style="margin-left: 35px;">
                    {!! Form::open(['route' => ['tickets.paypal', Crypt::encrypt($ticket->id)], 'method' => 'get']) !!}
                    {!! Form::submit($toggle_vip_text, ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </span>

            </div>

        </div>
    </div>
</div>