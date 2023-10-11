<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            return [
                'status' => $this->faker->randomElement(OrderStatus::getStatuses()),
                'total_price' => $this->faker->randomFloat(2, 10, 1000),
                'created_by' => 1, // You can set the created_by user ID here
                'updated_by' => 1, // You can set the updated_by user ID here
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

    }
}
