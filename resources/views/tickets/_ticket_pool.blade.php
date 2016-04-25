@if( count($ticket->priority) == 0 )
    <i class="fa fa-sticky-note-o bg-red"></i>
@else
    <i class="fa fa-sticky-note-o"
       style="background-color: {{ $ticket->priority->background_color }}; color: {{ $ticket->priority->name_color }}"></i>
@endif

<div class="timeline-item">
        <span class="time"><i
                    class="fa fa-clock-o"></i> {{ Carbon::createFromTimeStamp(strtotime($ticket->created_at))->diffForHumans() }}</span>
        <span class="time pull-left">

            @if( count($ticket->priority) == 0 )
                <small class="label label-danger">No Priority</small>
            @else
                <small class="label"
                       style="background-color: {{ $ticket->priority->background_color }}; color: {{ $ticket->priority->name_color }}">
                    <i class="fa"></i>
                    {{ $ticket->priority->name }}
                </small>
            @endif

        </span>

    <h3 class="timeline-header"><a href="#"></a> {{ $ticket->name  }}</h3>

    <div class="timeline-body">
        {{ $ticket->description }}
    </div>


    <div class="timeline-footer row">
        <div class="col-md-9">
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


        <div class="pull-right" style="margin-right: 10px">

            <a class="btn btn-info btn-xs" id="ticket-show"
               data-route={{route('tickets.show', $ticket->id)}} data-id={{$ticket->id}} ><i
                        class="fa fa-hand-pointer-o"></i> Show</a>

            @if( $user->hasRole(["Admin", "Supervisor"]))
                <a class="btn btn-danger btn-xs" id="ticket-destroy"
                   data-route={{route('tickets.destroy', $ticket->id)}} data-id={{$ticket->id}}>
                    <i class="fa fa-trash-o"></i> Delete</a>
            @else
                <a class="btn btn-success btn-xs" id="ticket-claim"
                   data-route={{route('tickets.claim', $ticket->id)}} data-id={{$ticket->id}}>
                    <i class="fa fa-calendar-plus-o"></i> Claim</a>
            @endif

            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                    <span class="caret"></span>
                    <span class="sr-only">Settings</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li><a id="ticket-invite"
                           data-route={{route('tickets.edit', $ticket->id)}} data-id={{$ticket->id}}><i class="fa fa-send-o"></i> Invite</a>
                    </li>
                    <li><a id="ticket-edit"
                       data-route={{route('tickets.edit', $ticket->id)}} data-id={{$ticket->id}}><i class="fa fa-edit"></i> Edit  </a>
                    </li>
                </ul>
            </div>


        </div>

    </div>

</div>