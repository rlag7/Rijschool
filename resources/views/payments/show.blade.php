@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Betaling details</h1>
        <ul>
            <li>Datum: {{ $payment->date->format('d-m-Y') }}</li>
            <li>Status: {{ $payment->status }}</li>
            <li>Notitie: {{ $payment->note }}</li>
        </ul>
    </div>
@endsection
