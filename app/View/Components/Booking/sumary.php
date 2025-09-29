<?php

namespace App\View\Components\Booking;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sumary extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $booking = session('booking', []);

        return view('components.booking.sumary', [
            'booking' => $booking
        ]);
    }
}
