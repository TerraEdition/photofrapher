<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
