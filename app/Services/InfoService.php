<?php

namespace App\Services;

class InfoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getRouteMap()
    {

        $routes = app(ApiService::class)->get('/info-image/route-map');
        //dd($routes);
        return ($routes['data']);
    }

    public function getTimeTable()
    {

        $route = app(ApiService::class)->get('/info-image/time-table');
        //dd($routes);
        return ($route['data']);
    }
}
