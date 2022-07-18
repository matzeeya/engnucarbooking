<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('department');
            $table->timestamps();
        });

        $data = [
            ['name'=>'สาขาวิชาวิศวกรรมคอมพิวเตอร์','department'=>'1'],
            ['name'=>'สาขาวิชาวิศวกรรมไฟฟ้า','department'=>'1'],
            ['name'=>'สาขาวิชาวิศวกรรมนวัตกรรมอัจฉริยะ','department'=>'1'],
            ['name'=>'สาขาวิชาวิศวกรรมอุตสาหการ','department'=>'2'],
            ['name'=>'สาขาวิชาวิศวกรรมวัสดุ','department'=>'2'],
            ['name'=>'สาขาวิชาวิศวกรรมเคมี','department'=>'2'],
            ['name'=>'สาขาวิชาวิศวกรรมเครื่องกล','department'=>'3'],
            ['name'=>'สาขาวิชาวิศวกรรมโยธา','department'=>'4'],
            ['name'=>'สาขาวิชาวิศวกรรมสิ่งแวดล้อม','department'=>'4']
        ];
        // Insert branch
        DB::table('branch')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch');
    }
}
