@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-plus-circle"></i> Nieuwe Melding Aanmaken
        </h1>

        <form action="{{ route('notifications.store') }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
                @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Bericht</label>
                <textarea name="message" id="message" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required>{{ old('message') }}</textarea>
                @error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="Concept" {{ old('status') == 'Concept' ? 'selected' : '' }}>Concept</option>
                    <option value="Verzonden" {{ old('status') == 'Verzonden' ? 'selected' : '' }}>Verzonden</option>
                </select>
                @error('status')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="bg-[#002E5B] hover:bg-[#001F3F] text-white py-2 px-4 rounded transition duration-200">
                <i class="fas fa-save"></i> Opslaan
            </button>

            <a href="{{ route('notifications.index') }}" class="ml-4 text-[#002E5B] hover:underline">Annuleren</a>
        </form>
    </div>
@endsection
