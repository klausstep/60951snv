<?php

namespace App\Http\Controllers;

use App\Models\Resource;

class ResourceViewController extends Controller
{
    public function index()
    {
        $resources = Resource::with('counters')->get();
        return view('resources.index', compact('resources'));
    }

    public function show($id)
    {
        $resource = Resource::with('counters')->findOrFail($id);
        return view('resources.show', compact('resource'));
    }
}
