<?php

namespace App\Services;

class RouteService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getRoutes($from, $to, $departdate)
    {

        $routes = app(ApiService::class)->get('/route', ['depart_station' => $from, 'dest_station' => $to, 'departdate' => $departdate]);
        //dd($routes);
        return ($routes['data']);
    }

    public function getRoute($subRouteId)
    {
        $route = app(ApiService::class)->get('/route/' . $subRouteId, []);
        $data = $route['data'] ?? [];

        return is_array($data) ? $this->normalizeRoutePayload($data) : $data;
    }

    /**
     * Ensure list/detail route payloads expose departure_station & destination_station
     * (some API endpoints use depart_station / dest_station only).
     */
    private function normalizeRoutePayload(array $data): array
    {
        if (! isset($data['departure_station']) && isset($data['depart_station'])) {
            $data['departure_station'] = $data['depart_station'];
        }
        if (! isset($data['destination_station']) && isset($data['dest_station'])) {
            $data['destination_station'] = $data['dest_station'];
        }

        $data['departure_time'] = $data['departure_time']
            ?? $data['depart_time']
            ?? $data['departtime']
            ?? $data['dep_time']
            ?? '';

        $data['arrival_time'] = $data['arrival_time']
            ?? $data['arrive_time']
            ?? $data['arrivetime']
            ?? $data['arr_time']
            ?? '';

        if (! isset($data['departure_timezone'])) {
            $data['departure_timezone'] = $data['depart_timezone'] ?? $data['departure_tz'] ?? '';
        }
        if (! isset($data['arrival_timezone'])) {
            $data['arrival_timezone'] = $data['arrive_timezone'] ?? $data['arrival_tz'] ?? '';
        }

        if (! isset($data['prices']) || ! is_array($data['prices'])) {
            $data['prices'] = [];
        }
        $data['prices'] = array_merge(
            [
                'regular' => 0.0,
                'regular_subtotal' => 0.0,
                'regular_discount' => 0.0,
            ],
            $data['prices']
        );

        if (! isset($data['icons']) || ! is_array($data['icons'])) {
            $data['icons'] = [];
        }

        return $data;
    }
}
