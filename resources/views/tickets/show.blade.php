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
                <img alt= "user image" class="online" src={{$ticket->customer->profile_image_path}}>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        {{--*/ $comments = $ticket->comments /*--}}
                        @if($comments->count()>0)
                            {{$comments->last()->owner->name}}
                        @else
                            {{$ticket->customer->name}}
                        @endif
                    </a>
                <p class="comment">
                    @if($comments->count()>0)
                        {{$comments->last()->body}}
                    @else
                        {{$ticket->description}}
                    @endif
                </p>
                </p>
            </div>
        </div>
        <!-- /.chat -->
        <div class="box-footer">
            {!! Form::open(['route' => ['tickets.comment.store', 'id' => $ticket->id ], 'method' => 'post', "id" => "comment-form"]) !!}
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