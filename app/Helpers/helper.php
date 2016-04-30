<?php

namespace App\Helpers;
use App\Models\User;
use DB;
/**
 * Created by PhpStorm.
 * User: mahmoudawadeen
 * Date: 4/30/16
 * Time: 2:32 AM
 */
class helper
{
    public static function freeAgents(){
        return User::where('role','Agent')->has('tickets','<','3')->lists('name','id')->toArray();
    }

}