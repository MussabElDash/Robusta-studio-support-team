@extends('layouts.home')

@section('content')
    <div class="row">

    </div>
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Action</th>
                    <th>Value</th>
                    <th>Text</th>
                    <th>Background Color</th>
                    <th>Text Color</th>
                </tr>
                @foreach( $priorities as $priority )
                    <tr id="priority-index-{{ $priority->id }}">
                        @include('priorities._priority_index', ['priority' => $priority])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
