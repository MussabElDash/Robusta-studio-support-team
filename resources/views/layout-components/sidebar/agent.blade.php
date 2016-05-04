<!-- Tabs that will be shared with higher roles -->
<li class="{{ active('agents.workspace') }}">
    <a href={{route('agents.workspace')}}><i class="fa fa-cogs"></i> <span>Workspace</span></a>
</li>
<li class="{{ active('agents/' . $user->slug) }}">
    <a href="/agents/{{$user->slug}}"><i class="fa fa-user"></i> <span>Profile</span></a>
</li>