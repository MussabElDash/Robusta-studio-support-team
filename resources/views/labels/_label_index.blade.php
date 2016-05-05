<td>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown">
            <span><i class="fa fa-gears"></i></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a id="edit-label-index" data-id={{ $label->id }}>Edit</a></li>
            <li><a id="destroy-label-index" data-id={{ $label->id }}>Delete</a></li>
        </ul>
</td>
<td>{{ $label->name }}</td>
<td><span class="label label-primary" style="background-color: {{ $label->background_color }} !important; color: {{ $label->background_color }} !important">2016</span></td>
<td><span class="label label-primary" style="background-color: {{ $label->name_color }} !important; color: {{ $label->name_color }} !important">2016</span></td>
