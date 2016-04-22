<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Department extends Model implements SluggableInterface
{
    use SluggableTrait;
    use BaseModel;

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
        'name' => 'required',
        'description' => 'required'
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
