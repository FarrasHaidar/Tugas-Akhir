<?php

namespace Database\Factories;

use App\Models\Grooming;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grooming>
 */
class GroomingFactory extends Factory
{
    protected $model = Grooming::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-7 day', '+1 month');
        $created_at = fake()->dateTimeBetween('-7 day', $date);

        return [
            'user_id' => User::all()->random(),
            'owner' => fake()->name(),
            'product_id' => Product::where('name', 'LIKE', '%grooming%')->get()->random(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'pet_name' => fake()->name(),
            'pet_gender' => fake()->randomElement(['jantan', 'betina']),
            'pet_age' => fake()->numberBetween('3', '1000'),
            'sinyalement' => 'kuping hitam',
            'equipment' => fake()->randomElement(['sisir', 'mainan', 'bola', 'selimut']),
            'date' => $date,
            // 'date' => "2024-03-20",
            'session' => fake()->randomElement(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00']),
            'note' => 'dijaaga baik2',
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
