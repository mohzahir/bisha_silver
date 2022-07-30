<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\SubCategory::factory(15)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\ProductAttribute::factory(40)->create();
        \App\Models\ProductImage::factory(40)->create();
        \App\Models\ProductOption::factory(1)->create();
        $this->call(ProductOptionValueSeeder::class);
        \App\Models\ProductOptionItem::factory(30)->create();
        \App\Models\Client::factory(1)->create();
        \App\Models\ProductReview::factory(30)->create();
        // \App\Models\ProductOptionValue::factory(4)->create();

    }
}
