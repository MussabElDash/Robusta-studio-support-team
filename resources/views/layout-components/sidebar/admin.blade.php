<!-- Admin tabs -->
@include('layout-components.sidebar.supervisor')
<li><a href="statistics.html"><i class="fa fa-pie-chart"></i> <span>Statistics</span></a></li>
<!-- Add Supervisor tabs as well -->

<li class="treeview">
    <a href="#">
        <i class="fa fa-ellipsis-h"></i> <span>Manage</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href={{ route('priorities.index') }}><i class="fa fa-circle-o text-red"></i> <span>Priorities</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Labels</span></a></li>
    </ul>
</li>