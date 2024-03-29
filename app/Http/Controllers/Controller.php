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
use App\Models\Notification;
use Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    protected $notifications;
    protected $departments;
    protected $labels;
    protected $priorities;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->departments = ['' => 'Select Department'] + Department::lists('name', 'id')->all();
        $this->labels = ['' => 'Select Label'] + Label::lists('name', 'id')->all();
        $this->priorities = ['' => 'Select Priority'] + Priority::lists('name', 'id')->all();
        $this->user = Auth::user();
        Log::info("@@@@@@");
        Log::info($this->user);
        // Log::info($this->user->id);
        $this->notifications = Notification::where(['recipient_id' => $this->user['id']])->orderBy('created_at', 'desc')->get();
        // $this->notifications = Notification::where('recipient_id', 2)->get();
        // Log::info($this->notifications);


        View::share('departments', $this->departments);
        View::share('labels', $this->labels);
        View::share('priorities', $this->priorities);
        View::share('notifications', $this->notifications);
        View::share('user', $this->user);
    }
}
