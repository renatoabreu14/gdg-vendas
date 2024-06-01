<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ProductSeeder::class,
            AddressSeeder::class,
            CustomerSeeder::class,
        ]);

//        User::factory()->create([
//            'name' => 'Thiago Luz',
//            'email' => 'thi@go.luz',
//            'password' => bcrypt('123456')
//        ]);
    }
}
