<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $departments;
    protected $user;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->departments = ['-1' => 'Select Department'] + Department::lists('name', 'id')->all();
        $this->user = Auth::user();
        View::share('departments', $this->departments);
        View::share('user', $this->user);
    }
}
