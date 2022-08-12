<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an Admin User 
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'status' => 'Active',
            'password' => Hash::make('admin@gmail.com'), // password
            'is_admin'=>true
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'phone'=>'08156851321',
            'status' => 'Pending',
            'password' => Hash::make('user@gmail.com'), // password
        ]);
    }
}
