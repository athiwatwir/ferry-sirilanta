<?php

namespace App\View\Components\Booking;

use App\Services\StationService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $departStations = app(StationService::class)->getDepart();
        //dd($departStations);
        return view('components.booking.form', [
            'departStations' => $departStations
        ]);
    }
}
