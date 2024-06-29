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
            OrderPaymentSeeder::class,
            OrderStatusSeeder::class,
        ]);

        /*User::factory()->create([
            'name' => 'Renato Oliveira Abreu',
            'email' => 'renato.abreu.info@gmail.com',
            'password' => bcrypt('12345678')
        ]);*/
    }
}
