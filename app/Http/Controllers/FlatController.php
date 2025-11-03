<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the flats.
     */
    public function index()
    {
        // Получаем все квартиры с их домом и счетчиками
        $flats = Flat::with(['house', 'counters'])->get();

        return response()->json([
            'success' => true,
            'data' => $flats
        ]);
    }

    /**
     * Display the specified flat with its house and counters.
     */
    public function show($id)
    {
        // Находим квартиру по ID с привязанным домом и счетчиками
        $flat = Flat::with(['house', 'counters'])->find($id);

        if (!$flat) {
            return response()->json([
                'success' => false,
                'message' => 'Flat not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $flat
        ]);
    }
}
