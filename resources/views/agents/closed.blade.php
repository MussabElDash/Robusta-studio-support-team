@extends('layouts.home')
@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="col-md-12">
        <ul class="timeline" id="tickets-pool">
            @include('tickets._tickets_pool')
        </ul>
    </div>
@endsection