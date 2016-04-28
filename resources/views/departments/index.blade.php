@extends('layouts.home')

@section('content_header')
    <h1>
      Departments <small>Control Panel</small>
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="/home"><i class="fa fa-dashboard"></i> Home</a>
      </li>
      <li class="active">Departments</li>
    </ol>
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-11 col-sm-11 col-xs-11">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All our departments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="No. of agents: activate to sort column ascending">No. of agents</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr onclick="window.location='/departments/{{$department['slug']}}'" role="row" class="odd" data-href="http://myspace.com" style="cursor: pointer">
                                              <td class="sorting_1">{{$department['name']}}</td>
                                              <td>{{$department['description']}}</td>
                                              <td>{{33}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Description</th>
                                            <th rowspan="1" colspan="1">No. of agents</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection
