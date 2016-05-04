@include('layouts._indexTable', [
    'breadcrumb' => 'Agents',
    'columns' => ['name', 'email', 'department', 'role','open','closed'],
    'idColumn' => 'slug',
    'route' => 'agents',
    'models' => $agents
    ])