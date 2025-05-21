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
            'password' => bcrypt('password'),

            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 1',
        ]);
        $john->assignRole('Owner');

        $jane = User::create([
            'first_name' => 'Jane',
            'middle_name' => 'van',
            'last_name' => 'Dijk',
            'birth_date' => '1995-05-15',
            'username' => 'jane.dijk',
            'password' => bcrypt('secret'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 2',
        ]);
        $jane->assignRole('Student');


        $mark = User::create([
            'first_name' => 'Mark',
            'middle_name' => '',
            'last_name' => 'Smith',
            'birth_date' => '1985-10-20',
            'username' => 'mark.smith',
            'password' => bcrypt('password123'),
            'is_logged_in' => false,
            'logged_in_at' => null,
            'logged_out_at' => null,
            'is_active' => true,
            'note' => 'Test user 3',
        ]);
        $mark->assignRole('Instructor');
    }
}
