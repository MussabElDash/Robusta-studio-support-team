<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;

class Comment extends BaseModel
{
    /*
        Mass Assignment
    */

    protected $fillable = ['body','user_id','user_type','status_id','ticket_id'];

    /*
        Validations
    */

    protected static $rules = [
        'body' => 'required',
        'user_id' => 'required',
        'ticket_id' => 'required'
    ];

    /*
     *   Relations
    */

    public function owner()
    {
        return $this->morphTo('user');
    }

    public function ticket()
    {
        return $this->belongsTo( Ticket::class );
    }
}
