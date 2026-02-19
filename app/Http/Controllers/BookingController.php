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
    public static function status()
    {
        $status = [
            'DR' => ['title' => 'Waiting for Payment', 'icon' => '<i class="fi fi-circle-spin"></i>', 'class' => '', 'action' => ''],
            'UNP' => ['title' => 'On Hold', 'icon' => '<i class="fa-solid fa-clock-rotate-left"></i>', 'class' => 'text-warning', 'action' => 'Unpaid'],
            'CO' => ['title' => 'Approved', 'icon' => '<i class="fa-solid fa-check-double"></i>', 'class' => 'text-success', 'action' => 'Paid'],
            'VO' => ['title' => 'Cancelled', 'icon' => '<i class="fa-solid fa-xmark"></i>', 'class' => 'text-danger', 'action' => 'Cancel'],
            'amended' => ['title' => 'Amended', 'icon' => '<i class="fa-solid fa-list-check"></i>', 'class' => 'text-blue-900', 'action' => ''],
            'delete' => ['title' => 'Deleted', 'icon' => '<i class="fa-solid fa-trash"></i>', 'class' => 'text-danger', 'action' => 'Delete'],
            'EXPIRED' => ['title' => 'Booking has expired', 'icon' => '<i class="fa-solid fa-trash"></i>', 'class' => 'text-danger', 'action' => 'Delete'],

        ];

        return $status;
    }
    public static function tripTypes()
    {
        return [
            'O' => 'ONE-WAY',
            'R' => 'RETURN',
            'M' => 'MULTI ISLAND'
        ];
    }
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
        $bookingRoutes = session('booking_routes', []);

        //return redirect()->route('booking.payment', ['id' => '5180dcca-65d9-4b80-b6a7-e1654ff97bf8']);
        //dd($request->all());

        //$subRoute = app(RouteService::class)->getRoute($bookData['outbound_sub_route_id']);
        $totalPassenger = $bookData['adult'];

        //$totalamt = $subRoute['prices']['regular'] * $bookData['adult'];

        //customers
        $customers = [];
        foreach ($request->customers as $customer) {
            $fullname = $customer['title']  . $customer['firstname'] . ' ' . $customer['lastname'];
            $customers[] = [
                'fullname' => $fullname,
                'type' => 'ADULT',
                'email' => $customer['email'],
                'mobile_code' => $customer['mobile_code'],
                'mobile' => $customer['mobile'],
                'isdefault' => 'Y',
                'other_contact' => $customer['other_contact']
            ];
        }

        $routes = [];
        if ($bookData['trip_type'] == 'O') {
            $subRoute = app(RouteService::class)->getRoute($bookingRoutes[0]['selected_route_id']);

            $totalamt = $totalPassenger * $subRoute['prices']['regular'];
            $routes[] = [
                'id' => $subRoute['id'],
                'traveldate' => $bookingRoutes[0]['traveldate'],
                'price' => $totalamt
            ];
        } elseif ($bookData['trip_type'] == 'R') {
            foreach ($bookingRoutes as $bookingRoute) {
                $subRoute = app(RouteService::class)->getRoute($bookingRoute['selected_route_id']);

                $totalamt = $totalPassenger * $subRoute['prices']['regular'];
                $routes[] = [
                    'id' => $subRoute['id'],
                    'traveldate' => $bookingRoute['traveldate'],
                    'price' => $totalamt
                ];
            }
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
            'aff_id' => $bookData['aff_id'],
            'note' => $request->description ?? null,

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


        $departStation = app(StationService::class)->getStation($depart_station);
        //dd($departStation);
        $destStation = app(StationService::class)->getStation($dest_station);

        $bookingRoutes = [];

        if ($trip_type == 'O') {
            $routes = app(RouteService::class)->getRoutes($depart_station, $dest_station, $depart_date);

            $_departDate = Carbon::parse($depart_date)->format('Y-m-d');
            $departDateText = Carbon::parse($depart_date)->format('D d M Y');

            $bookingRoutes[] = [
                'traveldate' => $_departDate,
                'traveldateText' => $departDateText,
                'departStation' => $departStation,
                'destStation' => $destStation,
                'routes' => $routes
            ];
        } elseif ($trip_type == 'R') {
            $routes = app(RouteService::class)->getRoutes($depart_station, $dest_station, $depart_date);

            $_departDate = Carbon::parse($depart_date)->format('Y-m-d');
            $departDateText = Carbon::parse($depart_date)->format('D d M Y');

            $bookingRoutes[] = [
                'traveldate' => $_departDate,
                'traveldateText' => $departDateText,
                'departStation' => $departStation,
                'destStation' => $destStation,
                'routes' => $routes
            ];

            $routes = app(RouteService::class)->getRoutes($dest_station, $depart_station, $return_date);
            $_departDate = Carbon::parse($return_date)->format('Y-m-d');
            $departDateText = Carbon::parse($return_date)->format('D d M Y');

            $bookingRoutes[] = [
                'traveldate' => $_departDate,
                'traveldateText' => $departDateText,
                'departStation' => $destStation,
                'destStation' => $departStation,
                'routes' => $routes
            ];
        } elseif ($trip_type == 'M') {
            $mRoutes = app(RouteService::class)->getRoutes($depart_station, $dest_station, $depart_date);
        }

        request()->session()->put('booking', request()->query());
        //dd(request()->query());

        //dd(session('booking'));
        return view('pages.booking.flight', [
            'bookingRoutes' => $bookingRoutes,
            'sessionData' => session('booking'),
            'tripType' => $trip_type,
            'departStation' => $departStation,
            'destStation' => $destStation,
            'depart_date' => $depart_date,
            'return_date' => $return_date,
            '_departDate' => $_departDate,
            'adult' => $adult,
            'departDateText' => $departDateText
        ]);
    }

    public function passenger(Request $request)
    {
        //dd($request->all());
        $booking_routes = $request->booking_routes;

        $booking = session('booking', []);
        session(['booking' => $booking]);
        session(['booking_routes' => $booking_routes]);

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
        for ($i = 0; $i < 14; $i++) {
            $cDate = $from->copy()->addDays($i);
            $dates[] = [
                'date' => $cDate->format('Y-m-d'),
                'date_text' => $cDate->format('d/m/Y'),
                'active' => ($start->isSameDay($cDate)) ? 'Y' : 'N'
            ];
        }

        return $dates;
    }

    public function view($bookingno)
    {
        $booking = app(BookingService::class)->getBooking($bookingno);

        $status = $this->status();
        //dd($booking);

        $paymentUrl = env("PAYMENT_URL") . '/payment/' . $bookingno;

        return view('pages.booking.view', compact('booking', 'status', 'paymentUrl'));
    }
}
