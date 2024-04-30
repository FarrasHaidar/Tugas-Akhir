<?php

namespace Database\Factories;

use App\Models\PetHotel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetHotel>
 */
class PetHotelFactory extends Factory
{

    protected $model = PetHotel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $end_date = fake()->dateTimeBetween('-1 month', '+1 month');
        $created_at = fake()->dateTimeBetween('-1 month', $end_date);
        return [
            'user_id' => User::all()->random(),
            'owner' => fake()->name(),
            'product_id' => Product::where('name', 'LIKE', '%hotel%')->get()->random(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'pet_name' => fake()->name(),
            'pet_food' => fake()->randomElement(['RK', 'Omeow', 'My Pet']),
            'pet_age' => fake()->numberBetween(5, 10),
            'pet_gender' => fake()->randomElement(['jantan', 'betina']),
            'start_date' => fake()->dateTimeBetween('-1 month', $end_date),
            'end_date' => $end_date,
            'vaccine' => 'media/syarat-1.svg',
            'medcheck' => 'media/syarat-1.svg',
            'note' => 'dijaaga baik2',
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
