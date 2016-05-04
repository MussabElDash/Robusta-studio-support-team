<!-- supervisor tabs will be shared with higher roles(admin)-->
<li class="{{ active('home') }}">
    <a href="/home"><i class="fa fa-dashboard"></i> <span>Feed</span></a>
</li>
<li class="{{ active('departments.*') }}">
    <a href="/departments"><i class="fa fa-dashboard"></i> <span>Departments</span></a>
</li>
<li class="{{ active('tickets.pool') }}">
    <a href="{{ route('tickets.pool') }}">
        <i class="fa fa-sticky-note-o"></i>
        <span>Tickets Pool</span>
    </a>
</li>
<li class="{{ active(['agents.*', 'not:agents/' . $user->slug]) }}">
    <a href="/agents"><i class="fa fa-users"></i> <span>Agents</span></a>
</li>

