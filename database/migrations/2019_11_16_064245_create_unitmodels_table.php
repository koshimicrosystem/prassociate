<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_name')->nullable();
            $table->string('model_number');
            $table->string('description');
            $table->string('default_1')->nullable();
            $table->string('default_2')->nullable();
            $table->string('default_3')->nullable();
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
        Schema::dropIfExists('unitmodels');
    }
}
