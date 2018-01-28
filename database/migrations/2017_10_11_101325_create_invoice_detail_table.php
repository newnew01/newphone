<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('invoice_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->double('discount')->default(0);
            $table->string('sn')->nullable();
            $table->integer('amount')->default(1);
            $table->boolean('free_gift')->default(0);
            $table->boolean('ais_deal')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_detail');
    }
}
