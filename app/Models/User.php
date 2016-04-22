<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use App\Models\Ticket;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable implements SluggableInterface
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
        'name' => 'required',
        'email' => array(
            'required',
            'max:50',
            'email',
            'unique:users'
        ),
        'password' => 'required'

    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','date_of_birth','image_url','department_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relations
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function tickets()
    {
        return $this->hasMany( Ticket::class );
    }
}
