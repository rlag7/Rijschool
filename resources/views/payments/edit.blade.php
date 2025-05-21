@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Betaling bewerken</h1>

        <form action="{{ route('payments.update', $payment) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Velden hier -->
        </form>
    </div>
@endsection
