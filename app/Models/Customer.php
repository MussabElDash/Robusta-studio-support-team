<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /*
        Mass Assignment
    */

    protected $fillable = ['twitter_id', 'name', 'notes', 'phone_number', 'profile_image_path'];

    /*
        Validations
    */
    protected $rules = [
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
