<!-- supervisor tabs will be shared with higher roles(admin)-->
<li class="{{ active('departments.*') }}">
    <a href="/departments"><i class="fa fa-dashboard"></i> <span>Departments</span></a>
</li>
<li class="{{ active(['agents.*', 'not:agents/' . $user->slug]) }}">
    <a href="/agents"><i class="fa fa-users"></i> <span>Agents</span></a>
</li>

