<div class="modal fade" id="show-ticket-modal-{{ $ticket->id }}" tabindex="-1" role="dialog"
     aria-labelledby="show-ticket-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #357ca5; color: #FFFFFF">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">
                    {{ $ticket->name }}
                </h4>
            </div>

            <div class="modal-body">
                <div class="box box-solid">
                    <div class="box-body">
                        <blockquote>
                            <p>{{ $ticket->description }}</p>
                            <small>Creator : <cite title="Source Title"> {{ $ticket->creator->name }} </cite></small>
                        </blockquote>
                    </div>
                </div>

                <div style="margin-bottom: 10px">
                    @if( count($ticket->priority) == 0 )
                        <small class="label label-danger">No Priority</small>
                    @else
                        <small class="label"
                               style="background-color: {{ $ticket->priority->background_color }}; color: {{ $ticket->priority->name_color }}; margin: 20px">
                            <i class="fa"></i>
                            {{ $ticket->priority->name }}
                        </small>
                    @endif

                    @if( count($ticket->labels) == 0)
                        <small class="label label-info">Not Labeled</small>
                    @else
                        @foreach( $ticket->labels as $label)
                            <small class="label"
                                   style="background-color: {{ $label->background_color }}; color: {{ $label->name_color }}">
                                <i class="fa fa-tags"></i> {{ $label->name }}</small>
                        @endforeach
                    @endif
                </div>
                {{--<br>--}}

                <div class="box-footer box-comments" id="ticket-{{$ticket->id}}-comments">
                    @foreach( $ticket->comments as $comment)
                        @include('comments._comment', ['user' => $comment->user])
                    @endforeach
                </div>
                @if(!$closed)
                <div class="box-footer">
                    {!! Form::open(['route' => ['tickets.comment.store', 'id' => $ticket->id ], 'method' => 'post', "id" => "comment-form-" . $ticket->id]) !!}
                    <img class="img-responsive img-circle img-sm" src="/assets/images/user2-160x160.jpg"
                         alt="alt text">
                    <div class="img-push">
                        {!! Form::text('body', null, ['class' => 'form-control input-sm', 'placeholder' => "Press enter to post comment"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                @endif
            </div>


        </div>
    </div>
</div>