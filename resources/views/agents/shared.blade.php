@extends('layouts.home', [
    'headers' => ['Agents', $agent->name],
    'footers' => [
        'home' => ['href' => '/home', 'class' => 'fa-dashboard'],
        'Agents' => ['active' => true]
        ]
    ])