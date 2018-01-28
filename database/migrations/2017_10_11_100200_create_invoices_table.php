<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('customer_fname')->nullable();
            $table->string('customer_lname')->nullable();
            $table->integer('gender')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_tumbol')->nullable();
            $table->string('customer_ampher')->nullable();
            $table->string('customer_province')->nullable();
            $table->string('customer_zipcode')->nullable();
            $table->string('customer_tel')->nullable();
            $table->text('remark')->nullable();
            $table->integer('employee_id');
            $table->integer('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
