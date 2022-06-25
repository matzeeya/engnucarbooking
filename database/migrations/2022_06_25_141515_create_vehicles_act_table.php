<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesActTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_act', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id'); //รหัสยานพาหนะ
            $table->dateTime('date_act')->nullable(true); //วันที่ทำ พรบ.
            $table->dateTime('expire_act')->nullable(true); //พรบ. หมดอายุ
            $table->dateTime('date_insurance')->nullable(true); //วันที่ทำประกัน
            $table->dateTime('expire_insurance')->nullable(true); //วันหมดประกัน
            $table->string('insurance_company')->nullable(true); //บริษัทประกัน
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
        Schema::dropIfExists('vehicle_act');
    }
}
