<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Customer extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    protected $sluggable = [
        'build_from' => 'phone_number',
        'save_to' => 'slug',
        'unique' => true,
    ];

    /*
        Validations
    */
    protected static $rules = [
        'name' => 'required',
        'phone_number' => 'required|unique:customers,phone_number,',
    ];

    /*
        Mass Assignment
    */

    protected $fillable = ['twitter_id', 'name', 'notes', 'phone_number', 'profile_image_path'];

    protected $emptyIsNull = ['twitter_id', 'notes'];

    // Relations

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
