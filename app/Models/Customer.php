<?php

namespace App\Models;


class Customer extends BaseModel
{
    /*
        Mass Assignment
    */

    protected $fillable = ['twitter_id', 'name', 'notes', 'phone_number', 'profile_image_path'];

    /*
        Validations
    */
    protected static $rules = [
        'name' => 'required',
        'twitter_id' => 'required'
    ];

    /*
        Relations
    */

    public function creator()
    {
        return  $this->belongsTo('App\Models\User', 'creator_id');
    }
}
