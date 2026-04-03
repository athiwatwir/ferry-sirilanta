<?php

namespace App\View\Components\Booking;

use App\Http\Controllers\BookingController;
use App\Services\RouteService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
            $raw = app(RouteService::class)->getRoute($booking_route['selected_route_id']);
            $subRoute = is_array($raw) ? $this->normalizeRouteForSummary($raw) : [];
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

    /**
     * Passenger summary expects departure_station / destination_station with name & nickname.
     */
    private function normalizeRouteForSummary(array $route): array
    {
        foreach (['departure_station', 'destination_station'] as $key) {
            if (! isset($route[$key]) || ! is_array($route[$key])) {
                $route[$key] = ['name' => '', 'nickname' => '', 'piername' => null];
            } else {
                $route[$key] = array_merge(
                    ['name' => '', 'nickname' => '', 'piername' => null],
                    $route[$key]
                );
            }
        }

        $route['departure_time'] = $route['departure_time'] ?? '';
        $route['arrival_time'] = $route['arrival_time'] ?? '';

        if (! isset($route['prices']) || ! is_array($route['prices'])) {
            $route['prices'] = [];
        }
        $route['prices'] = array_merge(
            ['regular' => 0.0, 'regular_subtotal' => 0.0, 'regular_discount' => 0.0],
            $route['prices']
        );

        return $route;
    }
}
