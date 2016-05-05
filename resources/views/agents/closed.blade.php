@extends('layouts.home')
@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="col-md-12">
        <ul class="timeline" id="tickets-pool">
            @include('tickets._tickets_pool')
        </ul>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 ticket-pagination">
            {{--<a class="btn btn-default btn-block" href="{{ route('tickets.pool') }}?page=2">Load Older Tickets</a>--}}
            {{$tickets->render()}}
        </div>
    </div>
@endsection