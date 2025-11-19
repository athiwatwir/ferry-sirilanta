<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use App\Services\BookingService;
use App\Services\RouteService;
use App\Services\StationService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
            $fullname = $customer['firstname'] . ' ' . $customer['lastname'];
            $customers[] = [
                'fullname' => $fullname,
                'type' => 'ADULT',
                'email' => $customer['email'],
                'mobile' => $customer['mobile'],
                'isdefault' => 'Y'
            ];
        }

        $routes = [];
        if ($bookData['trip_type'] == 'O') {
            $routes[] = [
                'id' => $bookData['outbound_sub_route_id'],
                'traveldate' => $bookData['depart_date'],
                'price' => 1250
            ];
        } else {
            $routes[] = [
                'id' => $bookData['outbound_sub_route_id'],
                'traveldate' => $bookData['depart_date'],
                'price' => 0
            ];
            $routes[] = [
                'id' => $bookData['return_sub_route_id'],
                'traveldate' => $bookData['return_date'],
                'price' => 0
            ];
        }

        $data = [
            // ข้อมูลการจอง
            'departdate' => $bookData['depart_date'],
            'adult_passenger' => $bookData['adult'],
            //'child_passenger' => $bookData['child'],
            //'infant_passenger' => $bookData['infant'],
            'user_id' => null,
            'trip_type' => $bookData['trip_type'],
            'note' => null,
            'book_channel' => 'API',
            'ispremiumflex' => 'N',
            'promotion_id' => null,
            'api_merchant_id' => null,
            'referenceno' => null,

            // ข้อมูลลูกค้า
            'customers' => $customers,
            'routes' => $routes
        ];

        $result = app(BookingService::class)->create($data);
        //dd($result);
        $invoiceno = $result['invoiceno'];
        $url = env("PAYMENT_URL") . '/payment/' . $invoiceno;

        return redirect()->away($url);
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
        $return_date = request()->return_date;
        $depart_date = request()->depart_date;
        $trip_type = request()->trip_type;
        $adult = request()->adult ?? 1;

        $nowDate = Carbon::now();
        $_departDate = Carbon::parse($depart_date)->format('d/m/Y');
        //dd($depart_date);

        $aRoutes = app(RouteService::class)->getRoutes($depart_station, $dest_station, $depart_date);
        $aDate = $this->generateDateList($depart_date);


        $bRoutes = [];
        if ($trip_type == 'R') {
            $bRoutes = app(RouteService::class)->getRoutes($dest_station, $depart_station, $return_date);
        }

        request()->session()->put('booking', request()->query());
        //dd(request()->query());

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
            'destStation' => $destStation,
            'aDate' => $aDate,
            'depart_date' => $depart_date,
            'return_date' => $return_date,
            '_departDate' => $_departDate,
            'adult' => $adult
        ]);
    }

    public function passenger(Request $request)
    {
        $outbound_sub_route_id = $request->outbound_sub_route_id;
        $return_sub_route_id = $request->return_sub_route_id;

        $booking = session('booking', []);
        $booking['outbound_sub_route_id'] = $outbound_sub_route_id;
        $booking['return_sub_route_id'] = $return_sub_route_id;
        session(['booking' => $booking]);



        //dd($booking);

        return view('pages.booking.passenger', [
            'sessionData' => session('booking'),
        ]);
    }


    public function payment($id)
    {

        $booking = app(BookingService::class)->getBooking($id);
        return view('pages.booking.payment', [
            'booking' => $booking
        ]);
    }

    private function generateDateList($startDate)
    {
        $today = Carbon::today();
        $start = Carbon::parse($startDate);

        if ($start->isSameDay($today)) {
            $from = $today->copy();
        } else {
            $from = $start->copy()->subDays(3);
            if ($from->lessThan($today)) {
                $from = $today->copy();
            }
        }

        // from คือจุดเริ่มต้นแล้ว → ให้สร้าง 7 วันถัดไปเท่านั้น
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $cDate = $from->copy()->addDays($i);
            $dates[] = [
                'date' => $cDate->format('Y-m-d'),
                'date_text' => $cDate->format('d/m/Y'),
                'active' => ($start->isSameDay($cDate)) ? 'Y' : 'N'
            ];
        }

        return $dates;
    }
}
