<?php

namespace App\Models;



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
      return $this->belongsTo('App\Models\User');
    }

    public function ticket()
    {
      return $this->belongsTo('App\Models\Ticket');
    }
}
