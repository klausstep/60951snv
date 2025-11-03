<?php

namespace App\Http\Controllers;

use App\Models\Flat;

class FlatCounterController extends Controller
{
    /**
     * ls app/Http/Controllers/ | grep FlatCounter
     * Display all counters with values for the specified flat.
     */
    public function show($id)
    {
        $flat = Flat::with([
            'house',
            'counters.resource',
            'counters.values.period'
        ])->findOrFail($id);

        return view('flats.counters', compact('flat'));
    }
}
