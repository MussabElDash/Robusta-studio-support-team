<?php

namespace App\Models;
use Auth;
use Log;
class Notification extends BaseModel
{
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'actor_id' => 'required',
        'recipient_id' => 'required',
        'notifiable_id' => 'required',
        'notifiable_type' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'actor_id', 'recipient_id', 'notifiable_id', 'seen', 'notifiable_type', 'css_class'
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

    public function notifiable()
    {
        return $this->belongsTo(BaseModel::class, 'notifiable_id');
    }

    public function text()
    {
        $user = User::find($this->actor_id);
        if($this->notifiable_type == 'agents') {
            return $user->name . ' has viewed the agents list';
        }
        if($this->notifiable_type == 'tickets') {
            return $user->name . ' has assigned to a new ticket';
        }
        return "No message yet";
    }

    public function getURL()
    {
        Log::info("%%%%%");
        Log::info($this->notifiable_type);
        $user = User::find($this->actor_id);
        if($this->notifiable_type == 'agents') {
            return 'agents/' . $user->slug;
        }
        if($this->notifiable_type == 'tickets') {
            return 'tickets/pool';
        }
        return "No message yet";
    }
}
