<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('varient');
            $table->date('received_at');
            $table->string('supplier_name');
            $table->string('invoice_number');
            $table->integer('quantity');
            $table->double('price');
            $table->string('invoice_amount');
            $table->boolean('gst_applicable');
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
        Schema::dropIfExists('accesses');
    }
}
