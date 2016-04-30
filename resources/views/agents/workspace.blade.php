@extends('layouts.home')

@section('content-header-main', 'Tickets')
@section('content-header-sub', 'pool')

@section('breadcrumb')
    <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Workspace</li>
@endsection


@section('content')
    @foreach($tickets as $ticket )
        @include('tickets.show')
    @endforeach
@endsection

