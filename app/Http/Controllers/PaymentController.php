<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Haal betalingen op via facturen van de gebruiker (student)
        $payments = Payment::whereHas('invoice', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->latest()->get();

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'date' => 'required|date',
            'status' => 'required|string|max:255',
            'is_active' => 'boolean',
            'note' => 'nullable|string',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Betaling succesvol toegevoegd.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'status' => 'required|string|max:255',
            'is_active' => 'boolean',
            'note' => 'nullable|string',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Betaling bijgewerkt.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Betaling verwijderd.');
    }
}
