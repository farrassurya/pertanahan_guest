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
        // Panggil seeder untuk membuat user pertama, data dummy warga, dan persil
        $this->call([
            CreateFirstUser::class,
            CreateWargaDummy::class,  // Seeder data warga dummy (harus duluan)
            CreatePersilDummy::class, // Seeder data persil dummy (butuh warga_id)
        ]);

        // Uncomment jika ingin membuat dummy users untuk testing
        // User::factory(10)->create();
    }
}
