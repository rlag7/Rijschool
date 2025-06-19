<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Registration;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $invoices = [];

        if ($user->hasRole('Instructor')) {
            $invoices = Invoice::with('registration.user')
                ->orderBy('invoice_date', 'desc')
                ->get();
        } elseif ($user->hasRole('Student')) {
            $invoices = Invoice::whereHas('registration.user', function ($q) use ($user) {
                $q->where('id', $user->id);
            })->with('registration.user')->get();
        }

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $registrations = Registration::with('user')->get();
        return view('invoices.create', compact('registrations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_id' => ['required', 'exists:registrations,id'],
            'invoice_number' => ['required'],
            'invoice_date' => ['required', 'date'],
            'amount_excl_vat' => ['required', 'numeric', 'min:0'],
            'vat' => ['required', 'numeric', 'min:0'],
            'amount_incl_vat' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string'],
        ], [
            'registration_id.required' => 'Registratie is verplicht.',
            'registration_id.exists' => 'Ongeldige registratie geselecteerd.',
            'invoice_number.required' => 'Factuurnummer is verplicht.',
            'invoice_date.required' => 'Factuurdatum is verplicht.',
            'invoice_date.date' => 'Factuurdatum moet een geldige datum zijn.',
            'amount_excl_vat.required' => 'Bedrag exclusief btw is verplicht.',
            'amount_excl_vat.numeric' => 'Bedrag exclusief btw moet een nummer zijn.',
            'vat.required' => 'BTW is verplicht.',
            'vat.numeric' => 'BTW moet een nummer zijn.',
            'amount_incl_vat.required' => 'Bedrag inclusief btw is verplicht.',
            'amount_incl_vat.numeric' => 'Bedrag inclusief btw moet een nummer zijn.',
            'status.required' => 'Status is verplicht.',
        ]);

        try {
            // Force an error by attempting to create a duplicate invoice_number
            $existing = Invoice::where('invoice_number', $validated['invoice_number'])->first();
            if ($existing) {
                throw new \Exception('Factuurnummer al in gebruik');
            }
            Invoice::create($validated);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }

        return redirect()->route('invoices.index')->with('success', 'Factuur succesvol aangemaakt.');
    }


    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $registrations = Registration::with('user')->get();
        return view('invoices.edit', compact('invoice', 'registrations'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
