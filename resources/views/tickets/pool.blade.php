@extends('layouts.home', [
    'headers' => ['Tickets Pool', 'Control Panel'],
    'footers' => [
        'home' => ['href' => '#', 'class' => 'fa-dashboard'],
        'Tickets Pool' => ['active' => true]
        ]
    ])

@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>

    {{--<div class="row" style="margin-bottom: 10px">--}}
    {{--<div class="col-md-4 col-md-offset-4">--}}
    {{--<button class="btn btn-default btn-block">Refresh</button>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="col-md-12">
        <ul class="timeline" id="tickets-pool">
            @include('tickets._tickets_pool')
        </ul>
    </div>


    <div class="row">
        <div class="col-md-4 col-md-offset-4 ticket-pagination">
            {{--<a class="btn btn-default btn-block" href="{{ route('tickets.pool') }}?page=2">Load Older Tickets</a>--}}
            {{ $tickets->links() }}
        </div>
    </div>

    {{--    {{dd(DB::getQueryLog())}}--}}
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

            <li class="active"><a href="#control-sidebar-theme-demo-home-tab" data-toggle="tab"><i
                            class="fa fa-filter"></i></a></li>

        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn"><button type="submit" name="search" id="search-btn"
                                                          class="btn btn-flat"><i class="fa fa-search"></i>
                        </button></span>
                </div>
            </form>
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Label</h3>
                <ul class="control-sidebar-menu">

                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>

                <h3 class="control-sidebar-heading">Priority</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </aside>
@endsection