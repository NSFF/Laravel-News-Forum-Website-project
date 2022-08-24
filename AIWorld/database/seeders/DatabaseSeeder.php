<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(class:AdminUserSeeder::class);
        $this->call(class:UserSeeder::class);
        $this->call(class:PostSeeder::class);
        $this->call(class:NewsSeeder::class);
        $this->call(class:FaqSeeder::class);
    }
}
