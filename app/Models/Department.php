<?php

namespace App\Models;




use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Department extends BaseModel implements SluggableInterface
{
    use SluggableTrait;
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
    public function head(){
        return belongs_to('App\Models\User','user_id');
    }
}
