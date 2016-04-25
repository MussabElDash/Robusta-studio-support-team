@foreach( $tickets as $ticket )
    <li id={{ "ticket-". $ticket->id }}>
        @include('tickets._ticket_pool')
    </li>
@endforeach