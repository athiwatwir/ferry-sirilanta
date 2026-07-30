<?php

namespace App\Services;

class BookingService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function create($data)
    {
        // dd($data);
        $result = app(ApiService::class)->post('/booking/create', $data);
        // dd($result);
        return ($result['data']);
    }

    public function getBooking($id)
    {
        $result = app(ApiService::class)->get('/booking/' . $id, []);

        return ($result['data']);
    }
}
