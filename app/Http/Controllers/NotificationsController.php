<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function markAsRead() {
        foreach ($this->notifications as $notification) {
            $notification->update(['seen' => true]);
        }
        return Response::json(["success" => true], 200);
    }
}
