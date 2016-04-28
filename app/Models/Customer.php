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
        Validations
    */
    protected static $rules = [
        'name' => 'required',
        'phone_number' => 'required',
    ];

    /*
        Mass Assignment
    */

    protected $fillable = ['twitter_id', 'name', 'notes', 'phone_number', 'profile_image_path'];

    // Relations

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Methods
    public function setTwitterIdAttribute($value)
    {
        if (empty($value)) { // will check for empty string, null values, see php.net about it
            $this->attributes['twitter_id'] = NULL;
        } else {
            $this->attributes['twitter_id'] = $value;
        }
    }
}
