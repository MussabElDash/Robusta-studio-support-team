<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Models\Ticket;

class Priority extends BaseModel
{
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'required|unique:priorities',
        'value' => 'required',
        'background_color' => 'required',
        'name_color' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'background_color','name_color', 'description'
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
        return $this->hasMany( Ticket::class );
    }

}
