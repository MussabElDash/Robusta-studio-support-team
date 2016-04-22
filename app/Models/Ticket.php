<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Customer;
use App\Models\User;
use App\Models\Priority;
use App\Models\Label;

class Ticket extends BaseModel
{
    // Mass Assignment
    protected $fillable = []

    // Validations
    protected static $rules = [

    ]

    // Relations
    public function creator()
    {
        return $this->belongsTo( User::class, 'creator_id' );
    }

    public function priority()
    {
        return $this->hasOne( Priority::class );
    }

    public function department()
    {
        return $this->belongsTo( Department::class );
    }

    public function customer()
    {
        return $this->belongsTo( Customer::class );
    }

    public function labels()
    {
        return $this->belongsToMany( Label::class );
    }

    // Methods
}
