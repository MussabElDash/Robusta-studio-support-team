<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //actor_id
    //recipient_id
    //object_id
    //type
    //seen
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected $rules = [
        'actor_id' => 'required',
        'recipient_id' => 'required',
        'object_id' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'actor_id', 'recipient_id', 'object_id', 'type', 'seen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function actor()
    {
        return belong_to('App\Models\User', 'actor_id');
    }

    public function receiver()
    {
        return belong_to('App\Models\User', 'recipient_id');
    }

    public function object()
    {
        return belong_to('App\Models\BaseModel', 'recipient_id');
    }

    abstract public function text();
}
