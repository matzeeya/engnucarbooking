<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number'); //หมวด เลขทะเบียนรถ
            $table->string('vehicle_province'); //ทะเบียน จังหวัด
            $table->integer('status')->default(1); //สถานะยานพาหนะ 1:ปกติ 2:ซ่อม 3:จำหน่าย
            $table->integer('vehicle_type'); //ประเภทยานพาหนะ
            $table->integer('brand_id'); //ยี่ห้อยานพาหนะ
            $table->string('model')->nullable(true); //รุ่นยานพาหนะ
            $table->string('color')->nullable(true); //สียานพาหนะ
            $table->string('fuel')->nullable(true); //เชื้อเพลิง
            $table->string('serial_number')->nullable(true); //หมายเลขเครื่อง
            $table->string('serial_body')->nullable(true); //หมายเลขตัวถัง
            $table->float('price', 9, 2)->nullable(true); //ราคา
            $table->integer('seat')->nullable(true); //จำนวนที่นั่ง
            $table->dateTime('date_buy')->nullable(true); //วันที่ซื้อ
            $table->dateTime('date_input')->nullable(true); //วันที่รับเข้า
            $table->dateTime('date_register')->nullable(true); //วันที่จดทะเบียน
            $table->dateTime('expire_register')->nullable(true); //ทะเบียนหมดอายุ
            $table->integer('responsible_man')->default(0); //ผู้รับผิดชอบ 0:ยังไม่ระบุ etc. ตามรหัสสมาชิก
            $table->string('photo')->nullable(true);
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
        Schema::dropIfExists('vehicles');
    }
}
