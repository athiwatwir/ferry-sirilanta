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
        //dd($routes);
        return ($route['data']);
    }
}
