<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'name' => $this->faker->name,
            'descr' => $this->faker->realText($this->faker->numberBetween(100, 200)),
            'icon' => '',
            'status' => 'active',
        ];
    }
}
