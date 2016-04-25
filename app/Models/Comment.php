<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;

class Comment extends BaseModel
{
    /*
        Mass Assignment
    */

    protected $fillable = ['body'];

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
        return $this->belongsTo( User::class );
    }

    public function ticket()
    {
        return $this->belongsTo( Ticket::class );
    }
}
