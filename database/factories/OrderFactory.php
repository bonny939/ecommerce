<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use DB;
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
                'created_by' => DB::table("customers")->inRandomOrder()->first()->user_id,
                // 'updated_by' => null,
                'created_at' => Carbon::now(),
                // 'updated_at' => Carbon::now(),
            ];

    }
}
