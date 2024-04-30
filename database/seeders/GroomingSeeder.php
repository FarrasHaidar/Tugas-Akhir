<?php

namespace Database\Seeders;

use App\Models\Grooming;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroomingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grooming::factory(10)->create();
    }
}
