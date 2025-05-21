@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn betalingen</h1>

        @if($payments->isEmpty())
            <p>Nog geen betalingen gevonden.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Status</th>
                    <th>Notitie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->date->format('d-m-Y') }}</td>
                        <td>{{ $payment->status }}</td>
                        <td>{{ $payment->note ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
