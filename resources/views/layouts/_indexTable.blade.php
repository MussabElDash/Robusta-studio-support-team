@extends('layouts.home', [
    'headers' => [$breadcrumb, 'Control Panel'],
    'footers' => [
        'home' => ['href' => '/home', 'class' => 'fa-dashboard'],
        $breadcrumb => ['active' => true]
        ]
    ])

@section('box-body')
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        @foreach($columns as $column)
                            <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="{{ $column }}: activate to sort column descending">{{ title_case($column) }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($models as $model)
                        <tr onclick="window.location='/{{ $route }}/{{$model[$idColumn]}}'"
                            role="row" class="odd" data-href="http://myspace.com"
                            style="cursor: pointer">
                            @foreach($columns as $column)
                                <td> {{ $model[$column] }} </td>
                            @endforeach
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
@endsection

@section('content')
    <div class="margin-top content">
        <div class="row">
            <div class="col-xs-10 col-md-10 col-lg-10 col-xs-offset-1 col-md-offset-1 col-lg-offset-1">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All our {{ $breadcrumb }}</h3>
                    </div>
                    <div class="box-body">
                        @yield('box-body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection