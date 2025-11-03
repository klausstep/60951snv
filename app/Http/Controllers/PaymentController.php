<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Flat;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::with(['flat.house', 'period'])->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Display payments for the specified flat.
     */
    public function show($id)
    {
        $flat = Flat::with(['house', 'payments.period'])->findOrFail($id);
        return view('payments.show', compact('flat'));
    }
}
