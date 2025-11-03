<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the counters.
     */
    public function index()
    {
        // Получаем все счетчики с их квартирой и ресурсом
        $counters = Counter::with(['flat', 'resource'])->get();

        return response()->json([
            'success' => true,
            'data' => $counters
        ]);
    }

    /**
     * Display the specified counter with its flat and resource.
     */
    public function show($id)
    {
        // Находим счетчик по ID с привязанными квартирой и ресурсом
        $counter = Counter::with(['flat', 'resource', 'values'])->find($id);

        if (!$counter) {
            return response()->json([
                'success' => false,
                'message' => 'Counter not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $counter
        ]);
    }
}
