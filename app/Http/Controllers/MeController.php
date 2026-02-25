<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.me.index');
    }

    /**
     * Search for tickets by email and travel date.
     */
    public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'travel_date' => 'required|date',
        ]);

        // TODO: Implement ticket search logic
        // For now, redirect back with success message
        return redirect()->route('me.index')->with('success', 'กำลังค้นหาการจองของคุณ...');
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
        //
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
}
