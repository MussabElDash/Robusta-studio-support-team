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
        if (Request::ajax()) {
            if (Session::token() !== Request::header('csrftoken')) {
                // Change this to return something your JavaScript can read...
                throw new Illuminate\Session\TokenMismatchException;
            }
        } elseif (Session::token() !== Input::get('_token')) {
            throw new Illuminate\Session\TokenMismatchException;
        }
        return true;
    }
}
