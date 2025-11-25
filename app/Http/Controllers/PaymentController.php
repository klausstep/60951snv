<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        $payments = Payment::with(['flat.house', 'period'])
            ->orderBy('created_at', 'desc')
            ->paginate($perpage)
            ->withQueryString();

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

    /**
     * Show the form for editing the specified payment.
     */
    public function edit($id)
    {
        if (!Gate::allows('manage-payment')) {
            return back()->withErrors(['error' => 'У вас нет прав для редактирования платежей']);
        }

        $payment = Payment::with('flat.house')->findOrFail($id);
        $flats = Flat::with('house')->get();

        return view('payments.edit', compact('payment', 'flats'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        if (!Gate::allows('manage-payment')) {
            return back()->withErrors(['error' => 'У вас нет прав для редактирования платежей']);
        }

        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'flat_id' => 'required|exists:flats,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        $payment->update($validated);

        return redirect('/payments')->withErrors(['success' => 'Платеж успешно обновлен']);
    }

    public function destroy($id)
    {
        if (!Gate::allows('manage-payment')) {
            return back()->withErrors(['error' => 'У вас нет прав для удаления платежей']);
        }

        Payment::destroy($id);
        return redirect('/payments')->withErrors(['success' => 'Платеж успешно удален']);
    }
}
