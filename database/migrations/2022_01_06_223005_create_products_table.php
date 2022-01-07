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
            $table->text('name')->unique();
            $table->text('slug')->unique();
            $table->text('desc')->nullable();
            $table->text('content')->nullable();
            $table->string('price');
            $table->string('sale_price')->default("0")->nullable();
            $table->string('image');
            $table->enum('status', ["0", "1"])->default("0");
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
