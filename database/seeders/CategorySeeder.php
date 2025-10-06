<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // <-- Add this import

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate(['name' => 'Конференція']);
        Category::firstOrCreate(['name' => 'Вебінар']);
        Category::firstOrCreate(['name' => 'Семінар']);
        Category::firstOrCreate(['name' => 'Концерт']);
    }
}
