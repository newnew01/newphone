<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_reference', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('source_branch');
            $table->integer('destination_branch');
            $table->integer('employee_id');
            $table->integer('ref_type');
            $table->string('document_ref')->default(null)->nullable();
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_reference');
    }
}
