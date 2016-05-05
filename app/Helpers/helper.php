<?php

namespace App\Helpers;
use App\Models\User;
use DB;
use Auth;
use Log;
/**
 * Created by PhpStorm.
 * User: mahmoudawadeen
 * Date: 4/30/16
 * Time: 2:32 AM
 */
class helper
{
    public static function getUser() {
        Log::info("---> in helpers");
        Log::info(Auth::user());
        return Auth::user();
    }
}
