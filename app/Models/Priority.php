<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends BaseModel
{
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'required',
        'value' => 'required',
        'background_color' => 'required',
        'name_color' => 'required'

    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'background','name_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
