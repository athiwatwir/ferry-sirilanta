<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use App\Services\BookingService;
use App\Services\RouteService;
use App\Services\StationService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $bookData = session('booking');
        $data = $request->all();

        //return redirect()->route('booking.payment', ['id' => '5180dcca-65d9-4b80-b6a7-e1654ff97bf8']);
        //dd($request->all());

        //customers
        $customers = [];
        foreach ($request->customers as $customer) {
            $fullname = $customer->firstname . ' ' . $customer->lastname;
            $customers[] = [
                'fullname' => $fullname,
                'type' => 'ADULT',
                'email' => $customer->email,
                'mobile' => $customer->mobile,
                'isdefault' => 'Y'
            ];
        }
        $data = [
            // ข้อมูลการจอง
            'departdate' => $bookData['depart_date'],
            'adult_passenger' => $bookData['adult'],
            'child_passenger' => $bookData['child'],
            'infant_passenger' => $bookData['infant'],
            'user_id' => null,
            'trip_type' => $bookData['trip_type'],
            'note' => null,
            'book_channel' => 'API',
            'ispremiumflex' => 'N',
            'promotion_id' => null,
            'api_merchant_id' => null,
            'referenceno' => null,

            // ข้อมูลลูกค้า
            'customers' => $customers
        ];

        $result = app(BookingService::class)->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function flight()
    {
        $depart_station = request()->depart_station_id;
        $dest_station = request()->dest_station_id;
        $depart_date = request()->depart_date;
        $trip_type = request()->trip_type;

        $aRoutes = app(RouteService::class)->getRoutes($depart_station, $dest_station);
        //dd($aRoutes);
        $bRoutes = [];
        if ($trip_type == 'R') {
            $bRoutes = app(RouteService::class)->getRoutes($dest_station, $depart_station);
        }

        request()->session()->put('booking', request()->query());

        $departStation = app(StationService::class)->getStation($depart_station);
        //dd($departStation);
        $destStation = app(StationService::class)->getStation($dest_station);

        //dd(session('booking'));
        return view('pages.booking.flight', [
            'aRoutes' => $aRoutes,
            'bRoutes' => $bRoutes,
            'sessionData' => session('booking'),
            'tripType' => $trip_type,
            'departStation' => $departStation,
            'destStation' => $destStation
        ]);
    }

    public function passenger(Request $request)
    {


        $selected_route = $request->selected_route;

        $booking = session('booking', []);
        $booking['selected_route'] = $selected_route;
        session(['booking' => $booking]);

        return view('pages.booking.passenger', [
            'sessionData' => session('booking')
        ]);
    }


    public function payment($id)
    {

        $booking = app(BookingService::class)->getBooking($id);
        return view('pages.booking.payment', [
            'booking' => $booking
        ]);
    }
}
