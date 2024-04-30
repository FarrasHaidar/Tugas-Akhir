<?php

namespace Database\Seeders;

use App\Models\Grooming;
use App\Models\Order;
use App\Models\PetHotel;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petHotels = PetHotel::all();
        $groomings = Grooming::all();
        foreach ($groomings as $key => $value) {
            $order = new Order([
                'user_id' => $value['user_id'],
                'price' => $value->product->price,
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
            $value->order()->save($order);
        }
        foreach ($petHotels as $key => $value) {
            $countDays = (int) date_diff(date_create($value['start_date']), date_create($value['end_date']))->format('%a');
            $price = $value->product->price * $countDays;
            if ($price == 0) {
                $price = $value->product->price;
            }
            $order = new Order([
                'user_id' => $value['user_id'],
                'price' => $price,
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
            $value->order()->save($order);
        }
    }
}
