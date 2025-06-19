@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-6 px-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Nieuwe Instructeur Toevoegen</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('instructors.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Voornaam</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Achternaam</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Geboortedatum</label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">E-mailadres</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Toevoegen
            </button>
            <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                Terug
            </a>
        </form>
    </div>
@endsection
