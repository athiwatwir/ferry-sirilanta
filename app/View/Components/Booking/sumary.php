<?php

namespace App\View\Components\Booking;

use App\Http\Controllers\BookingController;
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
        $booking_routes = session('booking_routes', []);
        //dd($booking_routes);
        $tripTypes = BookingController::tripTypes();

        $bookingRoutes = [];
        foreach ($booking_routes as $booking_route) {
            $subRoute = app(RouteService::class)->getRoute($booking_route['selected_route_id']);
            $bookingRoutes[] = [
                'traveldate' => $booking_route['traveldate'],
                'route' => $subRoute,
            ];
        }

        //dd($bookingRoutes);
        return view('components.booking.sumary', [
            'sessionData' => $sessionData,
            'bookingRoutes' => $bookingRoutes,
            'tripTypes' => $tripTypes
        ]);
    }
}
