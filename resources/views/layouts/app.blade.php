<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-2">Welcome, {{ Auth::user()->name }}!</h1>

                    @role('Owner')
                    <p class="text-gray-600">You are logged in as <strong>Owner</strong>. You can manage users, lessons, and reports.</p>
                    @endrole

                    @role('Instructor')
                    <p class="text-gray-600">You are logged in as <strong>Instructor</strong>. You can view and manage student lessons.</p>
                    @endrole

                    @role('Student')
                    <p class="text-gray-600">You are logged in as <strong>Student</strong>. Check your driving lessons and exams here.</p>
                    @endrole
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @role('Owner')
                <x-dashboard.card title="Total Users" icon="users" count="{{ \App\Models\User::count() }}" />
                <x-dashboard.card title="Total Students" icon="user-graduate" count="{{ \App\Models\Registration::count() }}" />
                <x-dashboard.card title="Instructors" icon="chalkboard-teacher" count="{{ \App\Models\Instructor::count() }}" />
                @endrole

                @role('Instructor')
                <x-dashboard.card title="Scheduled Lessons" icon="calendar-check" count="{{ \App\Models\DrivingLesson::count() }}" />
                <x-dashboard.card title="Assigned Students" icon="user" count="{{ \App\Models\Registration::count() }}" />
                @endrole

                @role('Student')
                <x-dashboard.card title="Upcoming Lessons" icon="calendar" count="{{ \App\Models\DrivingLesson::where('registration_id', Auth::user()->id)->count() }}" />
                <x-dashboard.card title="Exam Attempts" icon="clipboard-check" count="{{ \App\Models\Exam::where('registration_id', Auth::user()->id)->count() }}" />
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
