<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('faculty');
            $table->timestamps();
        });

        $data = [
            ['name'=>'ภาควิชาวิศวกรรมไฟฟ้าและคอมพิวเตอร์','faculty'=>'1'],
            ['name'=>'ภาควิชาวิศวกรรม','faculty'=>'1'],
            ['name'=>'ภาควิชาวิศวกรรม','faculty'=>'1'],
            ['name'=>'ภาควิชาวิศวกรรม','faculty'=>'1']
        ];
        // Insert department
        DB::table('department')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
