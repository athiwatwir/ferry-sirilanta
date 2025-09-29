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
        $result = app(ApiService::class)->post('/booking/create', $data);

        return ($result['data']);
    }

    public function getBooking($id)
    {
        $result = app(ApiService::class)->get('/booking/' . $id, []);

        return ($result['data']);
    }
}
