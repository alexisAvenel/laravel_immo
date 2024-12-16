<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

/**
 * @mixin IdeHelperOption
 */
class Option extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = 'options';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'icon'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'options_properties', 'option_id', 'property_id')
            ->as('option_property')
            ->using(OptionProperty::class);
    }
}
