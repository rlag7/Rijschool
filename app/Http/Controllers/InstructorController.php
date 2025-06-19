<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::with('user', 'drivingLessons')->orderBy('number')->get();
        return view('instructors.index', compact('instructors'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'first_name.required' => 'De voornaam is verplicht.',
            'last_name.required' => 'De achternaam is verplicht.',
            'birth_date.required' => 'De geboortedatum is verplicht.',
            'birth_date.before_or_equal' => 'De instructeur moet minimaal 18 jaar oud zijn.',
            'email.required' => 'Het e-mailadres is verplicht.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'email.unique' => 'Dit e-mailadres is al in gebruik.',
        ];

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
        ], $messages);

        $duplicate = User::where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'])
            ->whereHas('instructor')
            ->first();

        if ($duplicate) {
            return back()
                ->withErrors(['first_name' => 'Er bestaat al een instructeur met deze naam.'])
                ->withInput();
        }

        try {
            $user = User::create([
                'first_name' => $validated['first_name'],
                'middle_name' => null,
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'],
                'username' => strtolower($validated['first_name'] . '.' . $validated['last_name']),
                'email' => $validated['email'],
                'password' => Hash::make('default_password'),
                'is_logged_in' => false,
                'is_active' => true,
            ]);
            $user->assignRole('Instructor');

            \App\Models\Instructor::create([
                'user_id' => $user->id,
                'number' => 'INS-' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
                'is_active' => true,
                'note' => 'Toegevoegd door admin',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Er is een fout opgetreden: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('instructors.index')->with('success', 'Instructeur succesvol toegevoegd.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
