<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'background_color_id'=>'required',
        'name_color_id'=>'required'


    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'background_color_id', 'description','name_color_id'
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
