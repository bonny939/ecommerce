<?php

namespace Database\Factories;

use App\Models\Api\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            $order = Order::inRandomOrder()->first();
            $product = Product::inRandomOrder()->first();
            return [
                'order_id' => $order->id,
                'unit_price' => $this->faker->randomFloat(2, 1, 100),
                'product_id' => $product->id,
                'quantity' => $this->faker->numberBetween(1, 10),
            ];

    }
}
