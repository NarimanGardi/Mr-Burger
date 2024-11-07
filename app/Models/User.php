<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'backend_access',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const CSS_CLASS = ['primary','success','warning','info','secondary'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb-100')
              ->width(100)
              ->height(100);

        $this->addMediaConversion('thumb-38')
              ->width(38)
              ->height(38);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }
}
