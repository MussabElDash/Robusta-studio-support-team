<td>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown">
            <span><i class="fa fa-gears"></i></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a id="edit-priority-index" data-id={{ $priority->id }}>Edit</a></li>
            <li><a id="destroy-priority-index" data-id={{ $priority->id }}>Delete</a></li>
        </ul>
</td>
<td>{{ $priority->value  }}</td>
<td>{{ $priority->name }}</td>
<td><span class="label label-primary" style="background-color: {{ $priority->background_color }} !important; color: {{ $priority->background_color }} !important">2016</span></td>
<td><span class="label label-primary" style="background-color: {{ $priority->name_color }} !important; color: {{ $priority->name_color }} !important">2016</span></td>
