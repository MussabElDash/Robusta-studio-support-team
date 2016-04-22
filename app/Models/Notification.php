<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Notification extends Model
{
    use BaseModel;
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'actor_id' => 'required',
        'recipient_id' => 'required',
        'object_id' => 'required',
        'type' => 'required'
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
        return belong_to('App\Models\BaseModel','object_id');
    }
    abstract function text();

}
