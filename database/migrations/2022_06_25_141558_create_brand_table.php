<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $data = [
            ['name'=>'Toyota'],
            ['name'=>'Isuzu'],
            ['name'=>'Honda'],
            ['name'=>'Suzuki'],
            ['name'=>'Mitsubishi'],
            ['name'=>'Nissan'],
            ['name'=>'Mazda'],
            ['name'=>'Ford'],
            ['name'=>'MG'],
            ['name'=>'Kia'],
            ['name'=>'Hyundai'],
            ['name'=>'Volvo'],
            ['name'=>'Subaru']
        ];
        // Insert brand
        DB::table('brand')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand');
    }
}
