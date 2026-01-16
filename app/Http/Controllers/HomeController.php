<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $aff_id = request()->get('aff');
        if ($aff_id) {
            session()->put('aff_id', $aff_id);
        }

        if (session()->has('aff_id')) {
            $aff_id = session()->get('aff_id');
        }

        //dd(session()->get('aff_id'));

        return view('pages.home.index', compact('aff_id'));
    }
}
