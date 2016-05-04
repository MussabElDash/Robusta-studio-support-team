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
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown">
                                <span><i class="fa fa-gears"></i></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a id="edit-button">Edit</a></li>
                                <li><a id="destroy-priority-index" data-id={{ $priority->id }}>Delete</a></li>
                            </ul>
                    </td>
                    <td>{{ $priority->value  }}</td>
                    <td>{{ $priority->name }}</td>
                    <td><span class="label label-primary" style="background-color: {{ $priority->background_color }} !important; color: {{ $priority->background_color }} !important">2016</span></td>
                    <td><span class="label label-primary" style="background-color: {{ $priority->name_color }} !important; color: {{ $priority->name_color }} !important">2016</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
