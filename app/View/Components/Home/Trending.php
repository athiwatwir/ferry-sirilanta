<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trending extends Component
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
        $trendings = [
            [
                'title' => 'Koh Lipe',
                'cover_img' => asset('img/trending/koh-lipe-14-1024x497.webp')
            ],
            [
                'title' => 'Koh Phi Phi',
                'cover_img' => asset('img/trending/dreamstime_s_135187578.jpg')
            ],
            [
                'title' => 'Phuket',
                'cover_img' => asset('img/trending/best-things-to-do-in-phuket-old-town-main-image-hd-op.jpg')
            ],
            [
                'title' => 'Krabi',
                'cover_img' => asset('img/trending/Krabi-Thailand-1.jpg')
            ],
            [
                'title' => 'LANGKAWI, Malaysia',
                'cover_img' => asset('img/trending/1120-0751_langkawi-malaysia-attractions.jpg')
            ],
        ];


        return view('components.home.trending', [
            'trendings' => $trendings
        ]);
    }
}
