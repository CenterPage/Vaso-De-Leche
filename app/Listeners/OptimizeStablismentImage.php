<?php

namespace App\Listeners;

use App\Events\StablismentSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OptimizeStablismentImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $image = Image::make(Storage::get($event->stablisment->image))
            ->widen(800)
            ->limitColors(255)
            ->encode();

        // dd($image);

        Storage::put($event->stablisment->image, (string) $image);
    }
}
