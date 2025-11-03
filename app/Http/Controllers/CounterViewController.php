<?php

namespace App\Http\Controllers;

use App\Models\Counter;

class CounterViewController extends Controller
{
    public function index()
    {
        $counters = Counter::with(['flat', 'resource', 'values'])->get();
        return view('counters.index', compact('counters'));
    }

    public function show($id)
    {
        $counter = Counter::with(['flat', 'resource', 'values'])->findOrFail($id);
        return view('counters.show', compact('counter'));
    }
}
