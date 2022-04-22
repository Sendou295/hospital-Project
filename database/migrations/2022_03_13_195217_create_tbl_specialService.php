<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSpecialService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_specialService', function (Blueprint $table) {
            $table->Increments('specialService_id');
            $table->integer('equipment_id');
            $table->integer('department_id');
            $table->string('specialService_total');
            $table->string('specialService_status');
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
        Schema::dropIfExists('tbl_specialService');
    }
}
