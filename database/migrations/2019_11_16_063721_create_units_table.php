<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_name');
            $table->string('grn_number')->unique();
            $table->string('invoice_number');
            $table->double('ndp');
            $table->datetime('received_at');
            $table->unsignedBigInteger('unitmodel_id');
            $table->string('steering_type');
            $table->string('clutch_type');
            $table->string('pto_type');
            $table->string('material_code');
            $table->string('tr_sr_number');
            $table->string('engine_number');
            $table->string('chassis_number');
            $table->boolean('sold')->default(false);
            $table->string('order_number');
            $table->string('invoice_amount');
            $table->boolean('gst_applicable');
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
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
        Schema::dropIfExists('units');
    }
}
