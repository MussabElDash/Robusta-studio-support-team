{{ Carbon::setLocale('en') }}
<li id={{ "ticket-". $ticket->id }}>
    @if( count($ticket->priority) == 0 )
        <i class="fa fa-bullhorn bg-red"></i>
    @else
        <i class="fa fa-bullhorn"
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

        <h3 class="timeline-header"><a href="#">{{ $ticket->department->name }}</a> {{ $ticket->name  }}</h3>

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

            <div class="col-md-3 pull-right">
                <a class="btn btn-info btn-xs" id="ticket-link"><i class="fa fa-hand-pointer-o"></i> Show</a>
                <a class="btn btn-primary btn-xs" id="ticket-link"><i class="fa fa-edit"></i> Edit</a>

                <a class="btn btn-danger btn-xs" id="ticket-destroy"
                   data-route={{route('tickets.destroy', $ticket->id)}} data-id={{$ticket->id}}>
                    <i class="fa fa-trash-o"></i> Delete</a>


            </div>

        </div>


    </div>
</li>