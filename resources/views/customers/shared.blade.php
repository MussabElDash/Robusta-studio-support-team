@extends('layouts.home', [
    'headers' => ['Customers', $customer->name],
    'footers' => [
        'home' => ['href' => '/home', 'class' => 'fa-dashboard'],
        'Customers' => ['active' => true]
        ]
    ])