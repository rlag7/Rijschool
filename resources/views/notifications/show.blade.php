@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-6 max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-[#002E5B] flex items-center gap-3">
            <i class="fas fa-info-circle"></i> Melding Details #{{ $notification->id }}
        </h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full text-gray-700">
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Titel</th>
                    <td class="py-2">{{ $notification->title }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Bericht</th>
                    <td class="py-2">{{ $notification->message }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 text-left font-semibold">Status</th>
                    <td class="py-2">{{ $notification->status }}</td>
                </tr>
                <tr>
                    <th class="py-2 text-left font-semibold">Verstuurd Op</th>
                    <td class="py-2">{{ $notification->sent_at ? $notification->sent_at->format('d-m-Y H:i') : '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('notifications.index') }}" class="inline-block mt-6 text-[#002E5B] hover:underline">
                <i class="fas fa-arrow-left"></i> Terug naar overzicht
            </a>
        </div>
    </div>
@endsection
