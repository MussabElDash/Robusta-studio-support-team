<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //
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
        $v = Validator::make($this->attributes, static::$rules);

        if ($v->fails())
        {
            $this->errors = $v->errors;
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}