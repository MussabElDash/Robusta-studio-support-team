<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{
    protected static $rules = array();

    protected $errors;

    protected $passwordAttributes = array();

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model instanceof SluggableInterface) {
                $model->sluggify();
            }
            $valid = $model->validate();
            $model->fixPassword();
            return $valid;
        });

        static::updating(function ($model) {
            if ($model instanceof SluggableInterface && is_null($model->getSlug())) {
                $model->sluggify();
            }
            $valid = $model->validate(true);
//            dd($valid);
            $model->fixPassword();
            return $valid;
        });
    }

    public function validate($update = false)
    {
        if ($update && static::$rules['email']) {
            static::$rules['email'] .= $this->id;
            foreach ($this->passwordAttributes as $key) {
                array_forget(static::$rules, $key);
            }
        }

        $validator = Validator::make($this->attributes, static::$rules);
        if ($validator->fails()) {
            $this->errors = $validator->messages();
//            dd($this->errors);
            return false;
        }

        return true;
    }

    public function fixPassword()
    {
        foreach ($this->attributes as $key => $value) {
            // Remove any confirmation fields
            if (ends_with($key, '_confirmation') || empty($value)) {
                array_forget($this->attributes, $key);
                continue;
            }
            // Check if this one of our password attributes and if it's been changed.
            if (in_array($key, $this->passwordAttributes) && !Hash::check($value, $this->getOriginal($key))) {
                // Hash it
                $this->attributes[$key] = Hash::make($value);
                continue;
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }
}