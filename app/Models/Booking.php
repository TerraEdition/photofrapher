<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'locate'
            ]
        ];
    }

    /**
     * Get the user associated with the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Package()
    {
        return $this->belongsTo(Package::class,  'package_id', 'id');
    }
}
