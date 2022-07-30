<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('sub_category_id');
            $table->string('title');
            $table->string('slug');
            $table->integer('qty');
            $table->string('sku')->nullable();
            $table->double('price');
            $table->double('discount')->nullable()->default(0);
            $table->text('short_descr');
            $table->longText('descr');
            $table->text('descriptive_meta');
            $table->text('keywords_meta');
            $table->enum('status', ['active', 'inactive'])->default('active');
            // $table->integer('rate')->nullable();
            // $table->text('review')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
