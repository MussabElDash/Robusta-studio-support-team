<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
        Mass Assignment
    */

    protected $fillable = ['body'];

    /*
        Validations
    */

    protected $rules = [
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
