@extends('layouts.home')

@section('breadcrumb')
    Agents
@endsection

@section('content')
    <div class="margin-top content">
        <div class="row">
            <div class="col-xs-10 col-md-10 col-lg-10 col-xs-offset-1 col-md-offset-1 col-lg-offset-1">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All our Agents</h3>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending">
                                                Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Department: activate to sort column ascending">Department
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Role: activate to sort column ascending">Role
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($agents as $agent)
                                            <tr onclick="window.location='/agents/{{$agent->slug}}'"
                                                role="row" class="odd"
                                                style="cursor: pointer">
                                                <td class="sorting_1">{{$agent->name}}</td>
                                                <td>{{$agent->email}}</td>
                                                <td>{{$agent->department ? $agent->department->name : ''}}</td>
                                                <td>{{$agent->role}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Department</th>
                                            <th rowspan="1" colspan="1">Role</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection