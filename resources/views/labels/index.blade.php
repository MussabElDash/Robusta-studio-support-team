@extends('layouts.home')

@section('content')
    <div class="row">

    </div>
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Action</th>
                    <th>Text</th>
                    <th>Background Color</th>
                    <th>Text Color</th>
                </tr>
                @foreach( $labels as $label )
                    <tr id="label-index-{{ $label->id }}">
                        @include('labels._label_index', ['label' => $label])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
