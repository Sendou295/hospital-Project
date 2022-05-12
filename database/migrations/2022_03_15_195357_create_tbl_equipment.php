<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_equipment', function (Blueprint $table) {
            $table->Increments('equipment_id');
            $table->integer('service_id');
            $table->string('equipment_name');
            $table->text('equipment_desc');
            $table->text('equipment_image');
            $table->integer('equipment_status');
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
        Schema::dropIfExists('tbl_equipment');
    }
}
