<?php

namespace App\Http\Controllers;

use App\Models\House;

class HouseViewController extends Controller
{
    public function index()
    {
        $houses = House::with('flats')->get();
        return view('houses.index', compact('houses'));
    }

    public function show($id)
    {
        $house = House::with('flats')->findOrFail($id);
        return view('houses.show', compact('house'));
    }
}
