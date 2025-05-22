<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $john = User::create([
            'first_name' => 'John',
            'middle_name' => '',
            'last_name' => 'Doe',
            'birth_date' => '1990-01-01',
            'username' => 'john.doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 1',
        ]);
        $john->assignRole('Owner');

        //students
        $jane = User::create([
            'first_name' => 'Jane',
            'middle_name' => 'van',
            'last_name' => 'Dijk',
            'birth_date' => '1995-05-15',
            'username' => 'jane.dijk',
            'email' => 'jane@example.com',
            'password' => bcrypt('secret'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 2',
        ]);
        $jane->assignRole('Student');

        $john = User::create([
            'first_name' => 'john',
            'middle_name' => 'van',
            'last_name' => 'Dijk',
            'birth_date' => '1995-05-15',
            'username' => 'jaeene.dijk',
            'email' => 'j1ohn@example.com',
            'password' => bcrypt('secret'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 2',
        ]);
        $john->assignRole('Student');


        $hamid = User::create([
            'first_name' => 'hamid',
            'middle_name' => 'van',
            'last_name' => 'Di1jk',
            'birth_date' => '1995-05-15',
            'username' => 'jaane.dijk',
            'email' => 'hamid@example.com',
            'password' => bcrypt('secret'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 2',
        ]);
        $hamid->assignRole('Student');

        $mark = User::create([
            'first_name' => 'Mark',
            'middle_name' => '',
            'last_name' => 'Smith',
            'birth_date' => '1985-10-20',
            'username' => 'mark.smith',
            'email' => 'mark@example.com',
            'password' => bcrypt('password123'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 3',
        ]);
        $mark->assignRole('Instructor');

        // Add 3 new instructors explicitly:

        $inst1 = User::create([
            'first_name' => 'Alice',
            'middle_name' => '',
            'last_name' => 'Johnson',
            'birth_date' => '1980-02-15',
            'username' => 'alice.johnson',
            'email' => 'alice.johnson@example.com',
            'password' => bcrypt('password'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Additional instructor 1',
        ]);
        $inst1->assignRole('Instructor');

        $inst2 = User::create([
            'first_name' => 'Bob',
            'middle_name' => '',
            'last_name' => 'Williams',
            'birth_date' => '1975-11-30',
            'username' => 'bob.williams',
            'email' => 'bob.williams@example.com',
            'password' => bcrypt('password'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Additional instructor 2',
        ]);
        $inst2->assignRole('Instructor');

        $inst3 = User::create([
            'first_name' => 'Charlie',
            'middle_name' => '',
            'last_name' => 'Davis',
            'birth_date' => '1982-07-10',
            'username' => 'charlie.davis',
            'email' => 'charlie.davis@example.com',
            'password' => bcrypt('password'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Additional instructor 3',
        ]);
        $inst3->assignRole('Instructor');
    }
}
