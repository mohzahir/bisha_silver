<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'sub_category_id' => $this->faker->randomElement(SubCategory::pluck('id')->toArray()),
            'title' => $this->faker->name(),
            'slug' => 'المنتج-رقم-1',
            'descr' => $this->faker->realText($this->faker->numberBetween(200, 350)),
            'short_descr' => $this->faker->realText($this->faker->numberBetween(70, 100)),
            'qty' => array_rand(range(1, 10), 1),
            'price' => $this->faker->randomElement(['1000', '200', '400', '340']),
            'discount' => $this->faker->randomElement(['100', '50', '170', 0]),
            'descriptive_meta' => 'منتجو راديو',
            'keywords_meta' => 'منتجو راديو',
            // 'rate' => array_rand(range(1, 5), 1),
            'photo' => 'morvin/assets/images/product/img-3.png',
        ];
    }
}
