<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the houses.
     */
    public function index()
    {
        // Получаем все дома с их квартирами
        $houses = House::with('flats')->get();

        return response()->json([
            'success' => true,
            'data' => $houses
        ]);
    }

    /**
     * Display the specified house with its flats.
     */
    public function show($id)
    {
        // Находим дом по ID с привязанными квартирами
        $house = House::with('flats')->find($id);

        if (!$house) {
            return response()->json([
                'success' => false,
                'message' => 'House not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $house
        ]);
    }
}
