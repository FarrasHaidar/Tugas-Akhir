<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Grooming Biasa',
            'description' => 'Shampoo Biasa Parfum Potong Kuku Pembersihan Telinga',
            'price' => 35000,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Grooming Kutu',
            'description' => 'Shampoo Anti Kutu Parfum Potong Kuku Trimming Paw Pembersihan Telinga',
            'price' => 50000,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Grooming Jamur',
            'description' => 'Shampoo Anti Jamur Parfum Potong Kuku Trimming Pow Pembersihan Telinga',
            'price' => 50000,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Grooming Komplit',
            'description' => 'Shampoo Premium Parfum Potong Kuku Trimming Paw Pembersihan Telinga Degreaser',
            'price' => 65000,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Pet Hotel',
            'description' => 'Pet Hotel yang terjamin',
            'price' => 30000,
            'category_id' => 1,
        ]);
    }
}
