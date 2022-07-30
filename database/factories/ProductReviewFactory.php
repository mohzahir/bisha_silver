<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomElement(Product::pluck('id')->toArray()),
            'client_id' => $this->faker->randomElement(Client::pluck('id')->toArray()),
            'rate' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'review' => $this->faker->realText($this->faker->numberBetween(70, 100)),
        ];
    }
}
