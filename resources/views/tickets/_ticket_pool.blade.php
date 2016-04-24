<li id={{ "ticket-". $ticket->id }}>
    <i class="fa fa-bullhorn bg-red"></i>
    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
        <span class="time pull-left">
            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
        </span>

        <h3 class="timeline-header"><a href="#">{{ $ticket->department->name }}</a> {{ $ticket->name  }}</h3>

        <div class="timeline-body">
            {{ $ticket->description }}
        </div>


        <div class="timeline-footer row">
            <div class="col-md-9">
                <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
            </div>

            <div class="col-md-2 pull-right">
                <a class="btn btn-primary btn-xs" id="ticket-link"><i class="fa fa-hand-pointer-o"></i> Show</a>

                <a class="btn btn-danger btn-xs" id="ticket-destroy"
                   data-route={{route('tickets.destroy', $ticket->id)}} data-id={{$ticket->id}}>
                    <i class="fa fa-trash-o"></i> Delete</a>


            </div>

        </div>


    </div>
</li>