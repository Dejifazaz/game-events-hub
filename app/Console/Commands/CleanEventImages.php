<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Illuminate\Support\Facades\File;

class CleanEventImages extends Command
{
    protected $signature = 'events:clean-images';
    protected $description = 'Remove broken or duplicate image references from events';

    public function handle()
    {
        $usedImages = [];
        $deleted = 0;

        $events = Event::all();

        foreach ($events as $event) {
            $image = $event->image;

            // Skip if no image
            if (!$image) continue;

            // Handle external URLs (keep only if it's valid and not duplicate)
            if (str_starts_with($image, 'http')) {
                if (in_array($image, $usedImages)) {
                    $event->delete();
                    $this->info("Deleted duplicate event with image URL: $image");
                    $deleted++;
                } else {
                    $usedImages[] = $image;
                }
                continue;
            }

            // Handle local images
            $localPath = public_path('images/stadiums/' . $image);

            if (!File::exists($localPath)) {
                $event->delete();
                $this->info("Deleted event with missing image file: $image");
                $deleted++;
            } elseif (in_array($image, $usedImages)) {
                $event->delete();
                $this->info("Deleted duplicate event with image file: $image");
                $deleted++;
            } else {
                $usedImages[] = $image;
            }
        }

        $this->info("✅ Cleanup complete. $deleted events deleted.");
    }
}
