<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\InfoService;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    //
    public function index()
    {
        $timeTables = app(InfoService::class)->getTimeTable();
        return view('pages.timeTable.index', ['timeTables' => $timeTables]);
    }
}
