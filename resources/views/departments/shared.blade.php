@extends('layouts.home', [
    'headers' => ['Departments', $department->name],
    'footers' => [
        'home' => ['href' => '/home', 'class' => 'fa-dashboard'],
        'Departments' => ['active' => true]
        ]
    ])