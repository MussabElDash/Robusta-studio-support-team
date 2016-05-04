<div class="modal fade" id="edit-ticket-modal-{{ $ticket->id }}" tabindex="-1" role="dialog"
     aria-labelledby="edit-ticket-modal" aria-hidden="true">
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
                @include("tickets._form_feed",
                ['ticket' => $ticket, 'autoFill' => true,'route'=> ['tickets.update', 'id' => $ticket->id],
                'method'=>'put','class'=>'form-horizontal','agents'=>$agents])
            </div>
        </div>
    </div>
</div>