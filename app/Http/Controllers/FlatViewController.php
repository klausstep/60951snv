<?php

namespace App\Http\Controllers;

use App\Models\Flat;

class FlatViewController extends Controller
{
    public function index()
    {
        $flats = Flat::with(['house', 'counters', 'payments'])->get();
        return view('flats.index', compact('flats'));
    }

    public function show($id)
    {
        $flat = Flat::with(['house', 'counters', 'payments'])->findOrFail($id);
        return view('flats.show', compact('flat'));
    }
}
