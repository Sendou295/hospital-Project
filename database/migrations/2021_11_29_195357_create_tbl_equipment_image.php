<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEquipmentImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_equipment_image', function (Blueprint $table) {
            $table->Increments('equipment_image_id');
            $table->integer('equipment_id');
            $table->string('equipment_image_link');
            $table->text('equipment_image_desc');
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
        Schema::dropIfExists('tbl_equipment_image');
    }
}
