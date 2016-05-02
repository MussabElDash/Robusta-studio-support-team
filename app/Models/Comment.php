<?php

namespace App\Models;

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

    public function user()
    {
        return $this->morphTo();
    }

    public function ticket()
    {
        return $this->belongsTo( Ticket::class );
    }
}
