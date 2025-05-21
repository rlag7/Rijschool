<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

</div>
<footer class="bg-[#002E5B] text-white mt-12">
    <div class="max-w-7xl mx-auto px-4 py-12 grid gap-10 md:grid-cols-3 text-center md:text-left">
        <div>
            <h3 class="text-lg font-bold mb-2">Vierkante Wielen</h3>
            <p class="text-sm">Dé rijschool voor jongeren met een fysieke beperking.</p>
        </div>
        <div>
            <h4 class="font-semibold mb-2">Navigatie</h4>
            <ul class="space-y-1 text-sm">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="#diensten" class="hover:underline">Diensten</a></li>
                <li><a href="#inschrijven" class="hover:underline">Inschrijven</a></li>
                <li><a href="#contact" class="hover:underline">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-semibold mb-2">Contactgegevens</h4>
            <ul class="text-sm space-y-1">
                <li>Email: info@vierkantewielen.nl</li>
                <li>Telefoon: 06-12345678</li>
                <li>Adres: Rijschoolstraat 1, 1234 AB Utrecht</li>
            </ul>
        </div>
    </div>
    <div class="bg-[#001F3F] text-center py-4 text-sm text-gray-300">
        © {{ now()->year }} Rijschool Vierkante Wielen. Alle rechten voorbehouden.
    </div>
</footer>

</body>
</html>
