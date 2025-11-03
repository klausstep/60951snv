<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        // Получаем все ресурсы с их счетчиками
        $resources = Resource::with('counters')->get();

        return response()->json([
            'success' => true,
            'data' => $resources
        ]);
    }

    /**
     * Display the specified resource with its counters.
     */
    public function show($id)
    {
        // Находим ресурс по ID с привязанными счетчиками
        $resource = Resource::with('counters')->find($id);

        if (!$resource) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $resource
        ]);
    }
}
