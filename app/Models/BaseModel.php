<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Log;
use Validator;

class BaseModel extends Model
{
    protected static $rules = array();

    protected $errors;

    protected $passwordAttributes = array();

    private $removedAttributes = array();

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            return $model->fixAndValidate();
        });

        static::updating(function ($model) {
            return $model->fixAndValidate(true);
        });

        static::saved(function ($model) {
            $model->unFixAttributes();
        });
    }

    protected function fixAndValidate($update = false)
    {
        if ($this instanceof SluggableInterface) {
            $update ? $this->resluggify() : $this->sluggify();
        }
        if ($update) {
            $this->fixAttributes();
        }
        $this->nullifyEmpty();
        $valid = $this->validate($update);
        $this->fixPassword();
        return $valid;
    }

    public function validate($update = false)
    {
        if ($update) {
            foreach ($this->passwordAttributes as $key => $value) {
                if (!$value) {
                    array_forget(static::$rules, $key);
                }
            }
        }

        $validator = Validator::make($this->attributes, static::$rules);
        if ($validator->fails()) {
            $this->errors = $validator->messages();
            Log::error($validator->messages());
            return false;
        }

        return true;
    }

    protected function fixPassword()
    {
        foreach ($this->attributes as $key => $value) {
            // Remove any confirmation fields
            if (ends_with($key, '_confirmation')) {
                array_forget($this->attributes, $key);
                continue;
            }
            // Check if this one of our password attributes and if it's been changed.
            if (array_key_exists($key, $this->passwordAttributes) && $value !== $this->getOriginal($key)
                && !Hash::check($value, $this->getOriginal($key))
            ) {
                // Hash it
                $this->attributes[$key] = Hash::make($value);
                continue;
            }
        }
    }

    protected function fixAttributes()
    {
        foreach ($this->attributes as $key => $value) {
            if ((empty($value) && $this->getOriginal($key) == NULL) || ($value == $this->getOriginal($key))) {
                $this->removedAttributes[$key] = $this->attributes[$key];
                array_forget($this->attributes, $key);
                array_forget(static::$rules, $key);
                continue;
            }
        }
    }

    protected function nullifyEmpty()
    {
        foreach ($this->attributes as $key => $value) {
            if (empty($value)) {
                $this->attributes[$key] = null;
            }
        }
    }

    protected function unFixAttributes()
    {
        foreach ($this->removedAttributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
        $this->removedAttributes = array();
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
