<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number');
            $table->string('user'); //คนจอง: username คนจอง
            $table->string('title');
            $table->integer('chauffeur')->default(0); //คนขับ: รหัสคนขับ 0:ไม่ระบุ
            $table->integer('vehicle'); //ยานพาหนะที่ต้องการจอง: รถตู้/รถกระบะ
            $table->integer('vehicle_id')->nullable(true); //ยานพาหนะที่ได้รับการอนุมัติ: รหัสรถที่ได้
            $table->string('detail')->nullable(true);
            $table->integer('travelers')->nullable(true); //จำนวนผู้โดยสาร
            $table->string('options')->nullable(true); //ออฟชั่นเสริม รหัส option
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('place')->default(1);  // 1:ในมหาลัย / 2:นอกมหาลัย / 3:ในจังหวัด / 4:นอกจังหวัด
            $table->string('location')->nullable(true); // สถานที่ไป
            $table->integer('useto')->default(1); //2: จองให้ผู้อื่น / 1:ใช้เอง
            $table->integer('faculty')->default(1); //จองให้ผู้อื่นระบุคณะ defualt 1:คณะวิศวะ
            $table->integer('status')->default(0); //สถานะการจอง: 0:รอตรวจสอบ / 1:อนุมัติ / 2:ไม่อนุมัติ / 3:ยกเลิกโดยผู้จอง / 4:ยกเลิกโดยเจ้าหน้าที่
            $table->string('reason')->nullable(true); //เหตุผลที่ยกเลิก
            $table->string('phone'); // เบอร์ภายใน
            $table->string('approver')->nullable(true); //คนอนุมัติ
            $table->dateTime('approved_date')->nullable(true); //วันที่อนุมัติ
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
        Schema::dropIfExists('bookings');
    }
}
