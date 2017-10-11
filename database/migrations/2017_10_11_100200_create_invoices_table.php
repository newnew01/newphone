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
            $table->string('invoice_id');
            $table->string('customer_fname');
            $table->string('customer_lname');
            $table->char('gender',1);
            $table->string('customer_address');
            $table->string('customer_tumbol');
            $table->string('customer_ampher');
            $table->string('customer_province');
            $table->string('customer_zipcode');
            $table->integer('employee_id');
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
