@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Overzicht facturen</h1>

        @if($invoices->isEmpty())
            <div class="alert alert-info">
                Er zijn nog geen facturen beschikbaar.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Factuurnummer</th>
                    <th>Naam Leerling/Instructeur</th>
                    <th>Datum</th>
                    <th>Bedrag</th>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ optional($invoice->registration->user)->name ?? 'Onbekend' }}</td>
                        <td>{{ $invoice->invoice_date->format('d-m-Y') }}</td>
                        <td>€ {{ number_format($invoice->amount_incl_vat, 2, ',', '.') }}</td>
                        <td>{{ ucfirst($invoice->status) }}</td>
                        <td>
                            <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-sm btn-primary">Bekijken</a>
                            <a href="#" class="btn btn-sm btn-secondary">Downloaden</a>
                            <a href="#" class="btn btn-sm btn-warning">Herinnering sturen</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
