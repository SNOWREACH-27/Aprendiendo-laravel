<?php

namespace Database\Seeders;

use  App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Victor Arana';
        $user->email = 'francisco@gmail.com';
        $user->password =  bcrypt('12345');
        $user->save();
        
        User::factory(10)->create();
    }
}
