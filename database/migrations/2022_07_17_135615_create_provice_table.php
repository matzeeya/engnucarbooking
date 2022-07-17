<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $data = [
            ['name'=>'เชียงราย'],
            ['name'=>'เชียงใหม่'],
            ['name'=>'ตาก'],
            ['name'=>'น่าน'],
            ['name'=>'พะเยา'],
            ['name'=>'แพร่'],
            ['name'=>'แม่ฮ่องสอน'],
            ['name'=>'ลำปาง'],
            ['name'=>'ลำพูน'],
            ['name'=>'อุตรดิตถ์'],
            ['name'=>'กาฬสินธุ์'],
            ['name'=>'ขอนแก่น'],
            ['name'=>'ชัยภูมิ'],
            ['name'=>'นครพนม'],
            ['name'=>'นครราชสีมา'],
            ['name'=>'บึงกาฬ'],
            ['name'=>'บุรีรัมย์'],
            ['name'=>'มหาสารคาม'],
            ['name'=>'มุกดาหาร'],
            ['name'=>'ยโสธร'],
            ['name'=>'ร้อยเอ็ด'],
            ['name'=>'เลย'],
            ['name'=>'ศรีสะเกษ'],
            ['name'=>'สกลนคร'],
            ['name'=>'สุรินทร์'],
            ['name'=>'หนองคาย'],
            ['name'=>'หนองบัวลำภู'],
            ['name'=>'อำนาจเจริญ'],
            ['name'=>'อุดรธานี'],
            ['name'=>'อุบลราชธานี'],
            ['name'=>'กำแพงเพชร'],
            ['name'=>'ชัยนาท'],
            ['name'=>'นครนายก'],
            ['name'=>'นครปฐม'],
            ['name'=>'นครสวรรค์'],
            ['name'=>'นนทบุรี'],
            ['name'=>'ปทุมธานี'],
            ['name'=>'พระนครศรีอยุธยา'],
            ['name'=>'พิจิตร'],
            ['name'=>'พิษณุโลก'],
            ['name'=>'เพชรบูรณ์'],
            ['name'=>'ลพบุรี'],
            ['name'=>'สมุทรปราการ'],
            ['name'=>'สมุทรสงคราม'],
            ['name'=>'สมุทรสาคร'],
            ['name'=>'สิงห์บุรี'],
            ['name'=>'สุโขทัย'],
            ['name'=>'สุพรรณบุรี'],
            ['name'=>'สระบุรี'],
            ['name'=>'อ่างทอง'],
            ['name'=>'อุทัยธานี'],
            ['name'=>'จันทบุรี'],
            ['name'=>'ฉะเชิงเทรา'],
            ['name'=>'ชลบุรี'],
            ['name'=>'ตราด'],
            ['name'=>'ปราจีนบุรี'],
            ['name'=>'ระยอง'],
            ['name'=>'สระแก้ว'],
            ['name'=>'กาญจนบุรี'],
            ['name'=>'ประจวบคีรีขันธ์'],
            ['name'=>'เพชรบุรี'],
            ['name'=>'ราชบุรี'],
            ['name'=>'กระบี่'],
            ['name'=>'ชุมพร'],
            ['name'=>'ตรัง'],
            ['name'=>'นครศรีธรรมราช'],
            ['name'=>'นราธิวาส'],
            ['name'=>'ปัตตานี'],
            ['name'=>'พังงา'],
            ['name'=>'พัทลุง'],
            ['name'=>'ภูเก็ต'],
            ['name'=>'ระนอง'],
            ['name'=>'สตูล'],
            ['name'=>'สงขลา'],
            ['name'=>'สุราษฎร์ธานี'],
            ['name'=>'ยะลา']
        ];
        // Insert provinces in thai
        DB::table('provinces')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
