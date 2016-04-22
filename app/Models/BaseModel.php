<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Validator;

trait BaseModel
{
    protected $errors;

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
             return $model->validate();
        });

        static::updating(function($model)
        {
            return $model->validate();
        });
    }

    public function validate()
    {
        $validator = Validator::make($this->attributes, static::$rules);

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
