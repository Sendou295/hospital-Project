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
        Schema::create('tbl_base', function (Blueprint $table) {
            $table->increments('base_id');
            $table->string('base_name');
            $table->string('base_address');
            $table->string('base_email');
            $table->integer('base_phone');
            $table->string('base_link');
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
        Schema::dropIfExists('tbl_base');
    }
}
