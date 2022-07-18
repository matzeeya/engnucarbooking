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
            ['name'=>'สาขาวิชาวิศวกรรมไฟฟ้า'],
            ['name'=>'สาขาวิชาวิศวกรรมนวัตกรรมอัจฉริยะ'],
            ['name'=>'สาขาวิชาวิศวกรรมอุตสาหการ'],
            ['name'=>'สาขาวิชาวิศวกรรมวัสดุ'],
            ['name'=>'สาขาวิชาวิศวกรรมเคมี'],
            ['name'=>'สาขาวิชาวิศวกรรมเครื่องกล'],
            ['name'=>'สาขาวิชาวิศวกรรมโยธา'],
            ['name'=>'สาขาวิชาวิศวกรรมสิ่งแวดล้อม']
        ];
        // Insert provinces in thai
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
