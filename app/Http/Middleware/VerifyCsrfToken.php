<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Facades\Input;
use Log;
use Session;
use Request;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
     * Determine if the session and input CSRF tokens match.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function tokensMatch($request)
    {
        // If request is an ajax request, then check to see if token matches token provider in
        // the header. This way, we can use CSRF protection in ajax requests also.
        Log::info("tokens ... \n".'   '.Request::header('csrftoken').'   '.Session::token());
        Log::info("tokens ... \n".'   '.Input::get('_token').'   '.Session::token());
        if (Request::ajax()) {
            Log::info("tokens ... \n".'   '.Request::header('csrftoken').'   '.Session::token());
            if (Session::token() !== Request::header('csrftoken')) {
                // Change this to return something your JavaScript can read...
                throw new Illuminate\Session\TokenMismatchException;
            }
        }
        elseif (Session::token() !== Input::get('_token')) {
            Log::info("tokens ... \n".'   '.Input::get('_token').'   '.Session::token());
            throw new Illuminate\Session\TokenMismatchException;
        }
        // $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
        return true;
    }
}
