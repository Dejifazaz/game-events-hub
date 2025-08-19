<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Get the correct URL for an event image
     */
    public static function getEventImageUrl($imagePath)
    {
        if (empty($imagePath)) {
            return null;
        }

        // If it's already a full URL (external image)
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return $imagePath;
        }

        // If it's a storage path (starts with 'events/')
        if (str_starts_with($imagePath, 'events/')) {
            return asset('storage/' . $imagePath);
        }

        // If it's a stadium image from public/images/stadiums/
        if (str_starts_with($imagePath, 'public/images/stadiums/')) {
            return asset(str_replace('public/', '', $imagePath));
        }

        // If it's just a stadium filename
        if (str_contains($imagePath, '.jpg') || str_contains($imagePath, '.png') || str_contains($imagePath, '.jpeg')) {
            // Check if it exists in stadiums directory
            $stadiumPath = public_path('images/stadiums/' . $imagePath);
            if (file_exists($stadiumPath)) {
                return asset('images/stadiums/' . $imagePath);
            }
        }

        // Default fallback - try as storage path
        return asset('storage/' . $imagePath);
    }

    /**
     * Get a placeholder image URL
     */
    public static function getPlaceholderImage()
    {
        return asset('images/placeholder-event.jpg');
    }

    /**
     * Check if image exists
     */
    public static function imageExists($imagePath)
    {
        if (empty($imagePath)) {
            return false;
        }

        // If it's a full URL, assume it exists
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return true;
        }

        // Check storage path
        if (str_starts_with($imagePath, 'events/')) {
            return file_exists(storage_path('app/public/' . $imagePath));
        }

        // Check stadium path
        if (str_starts_with($imagePath, 'public/images/stadiums/')) {
            return file_exists(public_path(str_replace('public/', '', $imagePath)));
        }

        // Check if it's just a stadium filename
        if (str_contains($imagePath, '.jpg') || str_contains($imagePath, '.png') || str_contains($imagePath, '.jpeg')) {
            return file_exists(public_path('images/stadiums/' . $imagePath));
        }

        return false;
    }
}
