@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwe betaling</h1>

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <!-- Fields voor datum, status, etc. -->
            <!-- Voeg validatie toe indien nodig -->
        </form>
    </div>
@endsection
