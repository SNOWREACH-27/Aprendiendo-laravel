<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call llama a los otros seeders y ejecuta sus run.
        $this->call([
            UserSeeder::class,
            PostSeeder::class
        ]);
    }
}
