<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

use App\Models\Department;
use App\Models\Label;
use App\Models\Priority;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    protected $departments;
    protected $labels;
    protected $priorities;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->departments = ['-1' => 'Select Department'] + Department::lists('name', 'id')->all();
        $this->labels = ['-1' => 'Select Label'] + Label::lists('name', 'id')->all();
        $this->priorities = ['-1' => 'Select Priority'] + Priority::lists('name', 'id')->all();

        $this->user = Auth::user();

        View::share('departments', $this->departments);
        View::share('labels', $this->labels);
        View::share('priorities', $this->priorities);

        View::share('user', $this->user);
    }
}
