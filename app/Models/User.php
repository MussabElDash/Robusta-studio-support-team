<?php

namespace App\Models;

use Auth;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class User
 * @package App\Models
 */
class User extends BaseModel implements SluggableInterface, AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use SluggableTrait;


    /**
     * Class User
     * @package App\Models
     */


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
        'email' => 'required|max:50|email|unique:users,email,',
        'password' => 'required|confirmed',
        'role' => 'required|in:Admin,Supervisor,Agent',
        'date_of_birth' => 'date',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_confirmation',
        'gender', 'date_of_birth', 'profile_image_path', 'department_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_confirmation', 'remember_token',
    ];

    protected $passwordAttributes = ['password' => false];

    protected $emptyIsNull = ['date_of_birth', 'department_id'];

    // Relations
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function createdTickets()
    {
        return $this->hasMany(Ticket::class, 'creator_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_to');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'invited_id');
    }

    public function sentInvitations()
    {
        return $this->hasMany(Invitation::class, 'inviter_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'user');
    }

    public function ticketsCount()
    {
        return $this->hasOne(Ticket::class, 'assigned_to')
            ->select(DB::raw('assigned_to, count(*) as count'))->groupBy('assigned_to');
    }

    // Methods
    public function hasRole($roles)
    {

        $flag = false;

        foreach ($roles as $role) {
            $flag = $flag || ($this->role == $role);
        }

        return $flag;
    }
    public function canClaim()
    {
        return ($this->ticketsCount) ? $this->ticketsCount->count < 3 : true;
    }
    
    public function editable()
    {
        return Auth::user() == $this || Auth::user()->role == 'Admin';
    }
    public function scopeFreeAgents(Builder $query,$department_id){
        return $query->where('role','Agent')->where('department_id',$department_id)->has('tickets','<','3');
    }
    public function scopeFreeSupervisors(Builder $query){
        return $query->where('role','Supervisor')->where('department_id',null);
    }

}
