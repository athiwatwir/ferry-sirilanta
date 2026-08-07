<?php

namespace App\View\Components\Booking;

use App\Http\Controllers\BookingController;
use App\Services\RouteService;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sumary extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $sessionData = session('booking', []);
        $booking_routes = session('booking_routes', []);
        $tripTypes = BookingController::tripTypes();
        $tripType = $sessionData['trip_type'] ?? '';
        $segmentDates = array_values((array) ($sessionData['multi_segment_date'] ?? []));

        $bookingRoutes = [];
        foreach (array_values($booking_routes) as $index => $booking_route) {
            $raw = app(RouteService::class)->getRoute($booking_route['selected_route_id']);
            $subRoute = is_array($raw) ? $this->normalizeRouteForSummary($raw) : [];

            $seq = (int) ($booking_route['seq'] ?? ($index + 1));

            // Multi-island: ใช้ multi_segment_date ตาม seq เป็นหลัก
            $traveldate = $booking_route['traveldate'] ?? null;
            if ($tripType === 'M' && ! empty($segmentDates[$seq - 1])) {
                $traveldate = $segmentDates[$seq - 1];
            }

            $bookingRoutes[] = [
                'seq' => $seq,
                'traveldate' => $this->normalizeTravelDate($traveldate),
                'route' => $subRoute,
            ];
        }

        usort($bookingRoutes, function ($a, $b) {
            return ((int) ($a['seq'] ?? 0)) <=> ((int) ($b['seq'] ?? 0));
        });
        $bookingRoutes = array_values($bookingRoutes);

        return view('components.booking.sumary', [
            'sessionData' => $sessionData,
            'bookingRoutes' => $bookingRoutes,
            'tripTypes' => $tripTypes,
        ]);
    }

    /**
     * Normalize to Y-m-d to avoid timezone / ambiguous format mistakes.
     */
    private function normalizeTravelDate(mixed $date): ?string
    {
        if ($date === null || $date === '') {
            return null;
        }

        $date = trim((string) $date);

        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', $date, $m)) {
            return $m[1];
        }

        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Throwable $e) {
            return null;
        }
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
