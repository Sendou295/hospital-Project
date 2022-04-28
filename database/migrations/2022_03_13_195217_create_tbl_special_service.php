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
            $table->Increments('special_service_id');
            $table->integer('department_id');
            $table->string('special_service_name');
            $table->string('special_service_image'); 
            $table->text('special_service_desc');
            $table->integer('special_service_status'); 
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
