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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'user');
    }
}
