@include('layouts._indexTable', [
    'breadcrumb' => 'Departments',
    'columns' => ['name', 'description', 'no_of_agents'],
    'idColumn' => 'slug',
    'route' => 'departments',
    'models' => $departments
    ])