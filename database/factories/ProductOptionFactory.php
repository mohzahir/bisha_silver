<?php

namespace Database\Factories;

use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'المقاس',
            'option_type' => 'dropdown',
            'field_type' => 'text',
        ];
    }
}
