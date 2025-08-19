<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Event Model - Eloquent model for events
 * 
 * This model defines the relationship between events and users.
 * References: Laravel Eloquent - https://laravel.com/docs/12.x/eloquent
 *             Laravel Relationships - https://laravel.com/docs/12.x/eloquent-relationships
 */

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'date', 'location',
        'capacity', 'user_id', 'approved', 'image',
    ];

    protected $casts = [
        'date' => 'datetime',
        'approved' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
