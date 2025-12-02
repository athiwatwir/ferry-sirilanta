<?php

namespace App\View\Components\Booking;

use App\Services\RouteService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\StationService;

class Sumary extends Component
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

        //dd($sessionData);
        $departStation = app(StationService::class)->getStation($sessionData['depart_station_id']);
        //dd($departStation);
        $destStation = app(StationService::class)->getStation($sessionData['dest_station_id']);

        $subRoute = app(RouteService::class)->getRoute($sessionData['outbound_sub_route_id']);

        return view('components.booking.sumary', [
            'sessionData' => $sessionData,
            'departStation' => $departStation,
            'destStation' => $destStation,
            'subRoute' => $subRoute
        ]);
    }
}
