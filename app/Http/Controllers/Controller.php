<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Department;
use Illuminate\Support\Facades\View;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $agent_departments;
	protected $user;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->agent_departments = Department::lists('name', 'id');
        $this->user = Auth::user();
        View::share('agent_departments', $this->agent_departments);
        View::share('user', $this->user);
    }
}
