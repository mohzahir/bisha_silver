<?php

namespace Database\Seeders;

use App\Models\ProductOptionValue;
use Illuminate\Database\Seeder;

class ProductOptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductOptionValue::insert([
            [
                'product_option_id' => 1,
                'title' => 'XL',
                'color' => '',
            ],
            [
                'product_option_id' => 1,
                'title' => 'L',
                'color' => '',
            ],
            [
                'product_option_id' => 1,
                'title' => 'M',
                'color' => '',
            ],
            [
                'product_option_id' => 1,
                'title' => 'S',
                'color' => '',
            ],
        ]);
    }
}
