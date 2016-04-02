<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    //name
    //value
    //background_color_id
    //description
    //slug
    //name_color_id
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'value' => 'required',
        'background_color_id' => 'required',
        'name_color_id' => 'required'

    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'background_id','name_color_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
