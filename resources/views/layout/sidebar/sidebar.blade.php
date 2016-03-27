<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    @include('layout.sidebar.search_form')

    <ul class="sidebar-menu">
      <li class="header">
        MAIN NAVIGATION
      </li>
      <!-- Common tabs -->
      <li class="active"><a href="../Statics/feed.html"><i class="fa fa-dashboard"></i> <span>Feed</span></a></li>
      <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>

      @if (true)
        @include('layout.sidebar.admin')
      @elseif (true)
        @include('layout.sidebar.supervisor')
      @else
        @include('layout.sidebar.agent')
      @endif

      <li class="treeview">
        <a href="#">
          <i class="fa fa-ellipsis-h"></i> <span>Settings</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#" data-toggle="modal" data-target="#create-department-modal"><i class="fa fa-plus"></i> <span>Create Department</span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#create-customer-modal"><i class="fa fa-plus"></i> <span>Create Customer</span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#create-agent-modal"><i class="fa fa-plus"></i> <span>Create Agent</span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#create-label-modal"><i class="fa fa-plus"></i> <span>Create Label</span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#create-priority-modal"><i class="fa fa-plus"></i> <span>Create Priority</span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#create-ticket-modal"><i class="fa fa-plus"></i> <span>Create Ticket</span></a></li>
        </ul>
      </li>

      <li class="header">Spotlight</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>VIP Tickets</span></a></li>
    </ul>
  </section>
</aside>

@section('modals')
  @parent

  @include('shared.modals.basic_modal', ['id' => 'create-department-modal', 'body' => 'department._form', 'title' => 'Create New Department'])
@endsection