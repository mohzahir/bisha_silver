<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductOptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionItemFactory extends Factory
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
            'product_option_id' => $this->faker->randomElement(ProductOption::pluck('id')->toArray()),
            'product_option_value_id' => $this->faker->randomElement(ProductOptionValue::pluck('id')->toArray()),
            'qty' => array_rand(range(1, 10), 1) + 1,
        ];
    }
}
