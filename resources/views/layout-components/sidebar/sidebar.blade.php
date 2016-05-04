<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$user->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        @include('layout-components.sidebar.search_form')
        <ul class="sidebar-menu">
            <li class="header">
                MAIN NAVIGATION
            </li>

            <li class="{{ active('home') }}">
                <a href="/home"><i class="fa fa-dashboard"></i> <span>Feed</span></a>
            </li>

            <li class="{{ active('tickets.pool') }}">
                <a href="{{ route('tickets.pool') }}">
                    <i class="fa fa-sticky-note-o"></i>
                    <span>Tickets Pool</span>
                </a>
            </li>

            @if ($user->hasRole(['Admin']))
                @include('layout-components.sidebar.admin')
            @elseif ($user->role == 'Supervisor')
                @include('layout-components.sidebar.supervisor')
            @else
                @include('layout-components.sidebar.agent')
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ellipsis-h"></i> <span>Settings</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if ($user->hasRole(['Admin']))
                        <li><a href="#" data-toggle="modal" data-target="#create-department-modal"><i
                                        class="fa fa-plus"></i> <span>Create Department</span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#create-agent-modal"><i class="fa fa-plus"></i>
                                <span>Create Agent</span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#create-label-modal"><i class="fa fa-plus"></i>
                                <span>Create Label</span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#create-priority-modal"><i
                                        class="fa fa-plus"></i> <span>Create Priority</span></a></li>
                        <li><a href="#" data-toggle="modal" data-target="#change-theme"><i class="fa fa-plus"></i>
                                <span>Change Theme</span></a></li>
                    @endif
                    <li><a href="#" data-toggle="modal" data-target="#create-customer-modal"><i class="fa fa-plus"></i>
                            <span>Create Customer</span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#create-ticket-modal"><i class="fa fa-plus"></i>
                            <span>Create Phone Ticket</span></a></li>
                </ul>
            </li>

            <li class="header">Spotlight</li>
            @if($user->department == 'VIP' || $user->hasRole(['Admin']))
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>VIP Tickets</span></a></li>
            @endif
        </ul>
    </section>
</aside>

@section('modals')
    @parent

    @if( $user->hasRole(['Admin', 'Supervisor']) )
        @include('shared.modals.basic_modal', ['id' => 'create-department-modal', 'body' => 'departments._form', 'title' => 'Create New Department'])
        @include('shared.modals.basic_modal', ['id' => 'create-agent-modal', 'body' => 'agents._form', 'title' => 'Create New Agent'])
        @include('shared.modals.basic_modal', ['id' => 'create-label-modal', 'body' => 'labels._form', 'title' => 'Create New Label'])
        @include('shared.modals.basic_modal', ['id' => 'create-priority-modal', 'body' => 'priorities._form', 'title' => 'Create New Priority'])
        @include('shared.modals.basic_modal', ['id' => 'change-theme', 'body' => 'settings._form_color', 'title' => 'Change Theme'])
        @include('shared.modals.basic_modal', ['id' => 'create-ticket-from-feed-modal', 'body' => 'tickets._form_feed', 'title' => 'Create Ticket'])
    @endif

    @include('shared.modals.basic_modal', ['id' => 'create-customer-modal', 'body' => 'customers._form', 'title' => 'Create New Customer'])
    @include('shared.modals.basic_modal', ['id' => 'create-ticket-modal', 'body' => 'tickets._form', 'title' => 'Create New Ticket'])

@endsection
