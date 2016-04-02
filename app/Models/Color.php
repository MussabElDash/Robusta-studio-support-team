<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /*
        Mass Assignment
    */

    protected $fillable = ['name', 'hex_value'];

    /*
        Validations
    */
    protected $rules = [
        'name' => 'required',
        'hex_value' => 'required'
    ];
}
