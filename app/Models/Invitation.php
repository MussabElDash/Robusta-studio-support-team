<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{

    use BaseModel;

    /*
        Mass Assignment
    */

    protected $fillable = ['inviter_id', 'invited_id', 'invitable_id', 'invitable_type'];

    /*
        Validations
    */

    protected static $rules = [
        'inviter_id' => 'required',
        'invited_id' => 'required',
        'invitable_type' => 'required',
        'invitable_id' => 'required',
    ];

    /*
     *   Relations
    */

    // Get the invitation owner
    public function inviter()
    {
        return $this->belongsTo('App\Models\User', 'inviter_id');
    }

    // Get the invited user
    public function invited()
    {
        return $this->belongsTo('App\Models\User', 'invited_id');
    }

    // Get the object the invited user invited to
    public function invitable()
    {
        return $this->morphTo();
    }
}
