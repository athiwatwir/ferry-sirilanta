<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCountryCode extends Component
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
        $path = public_path('files/country_code.json');
        $countryCodes = [];

        if (file_exists($path)) {
            $countryCodes = json_decode(file_get_contents($path), true);
        }

        return view('components.select-country-code', compact('countryCodes'));
    }
}
