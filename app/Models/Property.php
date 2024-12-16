<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

/**
 * @mixin IdeHelperProperty
 */
class Property extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'title',
        'description',
        'address',
        'city',
        'zip',
        'area',
        'pieces',
        'rooms',
        'stage',
        'price',
        'sold',
    ];
    protected $attributes = [
        'sold' => false,
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class, 'options_properties', 'property_id', 'option_id')
            ->as('option_property')
            ->using(OptionProperty::class);
    }

    public function getFullAddress(): string {
        return $this->address . ', ' . $this->zip . ' - ' . $this->city;
    }
}
