@include('layouts._indexTable', [
    'breadcrumb' => 'Agents',
    'columns' => ['name', 'email', 'department', 'role'],
    'idColumn' => 'slug',
    'route' => 'agents',
    'models' => $agents
    ])