<?php

namespace App\Models;


abstract class Notification extends BaseModel
{
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
        return $this->belongsTo(User::class, 'actor_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function object()
    {
        return $this->belongsTo(BaseModel::class, 'object_id');
    }

    abstract function text();

}
