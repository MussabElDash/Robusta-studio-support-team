<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;

class Department extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
    // use BaseModel;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'unique' => true,
    ];
    /**
     * The rules used for validation
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'description'
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
        return $this->hasMany(Ticket::class);
    }

    public function __toString()
    {
        // return parent::__toString(); // TODO: Change the autogenerated stub
        return $this->name;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function numberOfAgents()
    {
        return $this->with('users')->count();

    }
}
