<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia , SoftDeletes;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'food_order')
            ->withPivot('price', 'amount')
            ->withTimestamps();
    }
}
