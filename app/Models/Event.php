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
        'title', 'description', 'category', 'date', 'location',
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

    /**
     * Get category display name
     */
    public function getCategoryDisplayNameAttribute()
    {
        $categories = [
            'league_match' => 'League Match',
            'cup_match' => 'Cup Match',
            'friendly' => 'Friendly Match',
            'training' => 'Training Session',
            'tournament' => 'Tournament',
            'other' => 'Other'
        ];

        return $categories[$this->category] ?? 'Other';
    }

    /**
     * Get category color for UI
     */
    public function getCategoryColorAttribute()
    {
        $colors = [
            'league_match' => 'bg-blue-100 text-blue-800 border-blue-200',
            'cup_match' => 'bg-red-100 text-red-800 border-red-200',
            'friendly' => 'bg-green-100 text-green-800 border-green-200',
            'training' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'tournament' => 'bg-purple-100 text-purple-800 border-purple-200',
            'other' => 'bg-gray-100 text-gray-800 border-gray-200'
        ];

        return $colors[$this->category] ?? 'bg-gray-100 text-gray-800 border-gray-200';
    }
}
