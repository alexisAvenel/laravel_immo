<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Str;

class OptionProperty extends Pivot
{
    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
