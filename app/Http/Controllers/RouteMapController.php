<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\InfoService;
use Illuminate\Http\Request;

class RouteMapController extends Controller
{
    //

    public function index()
    {
        $routeMaps = app(InfoService::class)->getRouteMap();
        return view('pages.routeMap.index', ['routeMaps' => $routeMaps]);
    }
}
