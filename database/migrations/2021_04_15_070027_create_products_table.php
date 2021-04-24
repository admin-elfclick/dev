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
            $table->string('product_name');
            $table->string('slug')->nullable();
            $table->json('keyword')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('product_price');
            $table->string('product_link');
            $table->string('product_price_old')->nullable();
            $table->text('product_img');
            $table->text('product_multiple_img')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->text('product_meta_description');
            $table->text('product_description')->nullable();
            $table->bigInteger('content_id')->nullable();
            $table->integer('banner_id')->nullable();
            $table->bigInteger('category_id');
            $table->bigInteger('country_id')->nullable();
            $table->tinyInteger('status')->default(1);
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
