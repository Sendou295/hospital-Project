<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bases', function (Blueprint $table) {
            $table->increments('base_id');
            $table->string('base_name');
            $table->string('base_address');
            $table->string('base_email');
            $table->integer('base_phone');
            $table->string('base_image');
            $table->integer('base_status');
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
        Schema::dropIfExists('tbl_bases');
    }
}
