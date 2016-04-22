<?php

namespace App\Models;

use App\Models\Ticket;

class Label extends BaseModel implements SluggableInterface


{
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'required',
        'background_color' => 'required',
        'name_color' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'background_color', 'description', 'name_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    // Relations
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }

}
