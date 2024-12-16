<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Str;

/**
 * @mixin IdeHelperMedia
 */
class Media extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = 'medias';
    protected $keyType = 'string';
    protected $fillable = [
        'original_name',
        'private_name',
        'mime_type',
        'property_id'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function imageUrl(): string
    {
        return Storage::disk('public')->url('/properties/' . $this->private_name);
    }
}
