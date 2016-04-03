<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{
    protected static $rules = array();

    protected $errors;

    protected static function boot()
    {
        parent::boot();

        static::saving(function($model)
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