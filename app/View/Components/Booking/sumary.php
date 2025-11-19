<?php

namespace App\View\Components\Booking;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\StationService;

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
        $sessionData = session('booking', []);
        $departStation = app(StationService::class)->getStation($sessionData['depart_station_id']);
        //dd($departStation);
        $destStation = app(StationService::class)->getStation($sessionData['dest_station_id']);

        return view('components.booking.sumary', [
            'sessionData' => $sessionData,
            'departStation' => $departStation,
            'destStation' => $destStation
        ]);
    }
}
