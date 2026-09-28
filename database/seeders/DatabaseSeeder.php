<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\ProductVariantSeeder;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         $this->call([
        //CategorySeeder::class,
        //ProductSeeder::class,
        // SizeSeeder::class,
    //ColorSeeder::class,
    ProductVariantSeeder::class,
    ]);

       /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
