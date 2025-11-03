<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::withCount('flats')->get();
        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service with connected flats.
     */
    public function show($id)
    {
        $service = Service::with(['flats.house'])->findOrFail($id);
        return view('services.show', compact('service'));
    }
}
