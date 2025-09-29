<?php

namespace App\Services;

class StationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getDepart($group = 'N')
    {
        $routes = app(ApiService::class)->get('/station/departure', ['group' => $group]);

        return ($routes['data']);
    }

    public function getStation($id)
    {
        $station = app(ApiService::class)->get('/station/' . $id, []);

        return ($station['data']);
    }
}
