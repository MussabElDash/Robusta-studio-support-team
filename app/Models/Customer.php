<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Models\Ticket;

class Customer extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'unique'     => true,
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


    // Relations

    public function creator()
    {
        return  $this->belongsTo('App\Models\User', 'creator_id');
    }

    public function tickets()
    {
        return $this->hasMany( Ticket::class );
    }

    // Methods
    public function setTwitterIdAttribute($value) {
        // var_dump('Here' . $value . 'and Here');
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['twitter_id'] = NULL;
        } else {
            $this->attributes['twitter_id'] = $value;
        }
    }
}
