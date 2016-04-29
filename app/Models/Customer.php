<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Customer extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'unique' => true,
    ];
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
