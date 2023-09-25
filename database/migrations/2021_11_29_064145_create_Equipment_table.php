<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipment', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->string('Equipment_Type', 50)->nullable();
            $table->string('Model_No', 50)->nullable();
            $table->string('Brand_Name', 100)->nullable();
            $table->integer('Load_Capacity')->nullable();
            $table->string('Status', 30)->nullable();
            $table->unsignedInteger('Order_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Equipment');
    }
}
