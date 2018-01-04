<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->string('product_name');
            $table->integer('brand_id');
            $table->string('model')->nullable();
            $table->integer('category_id');
            $table->string('description')->nullable();
            $table->integer('amount')->default(0);
            $table->integer('price')->default(0);
            $table->integer('cost')->default(0);
            $table->boolean('type_sn');
            $table->string('barcode')->nullable()->unique();
            $table->string('image')->nullable();
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
