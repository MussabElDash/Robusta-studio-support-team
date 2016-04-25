<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Models\Ticket;
use App\Models\User;

class Department extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    // use BaseModel;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'unique'     => true,
    ];
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id','description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    // public function head(){
    //     return $this->belongsTo(User::class,'user_id');
    // }

    // Relations
    public function tickets()
    {
        return $this->hasMany( Ticket::class );
    }
}
