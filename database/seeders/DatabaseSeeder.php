<?php

namespace Database\Seeders;
use App\Models\ModulesData;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ModulesData::factory()->count(10)->create(); // Adjust count as needed
    }
}
