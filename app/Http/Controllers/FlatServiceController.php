<?php

namespace App\Http\Controllers;

use App\Models\Flat;

class FlatServiceController extends Controller
{
    /**
     * Display the specified flat with connected services.
     */
    public function show($id)
    {
        $flat = Flat::with(['services', 'house'])->findOrFail($id);

        return view('flats.services', compact('flat'));
    }
}
