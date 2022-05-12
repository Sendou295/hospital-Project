<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSpecialist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_specialist', function (Blueprint $table) {
            $table->increments('specialist_id');
            $table->integer('position_id');
            $table->integer('base_id');
            $table->integer('department_id');
            $table->string('specialist_name');
            $table->string('specialist_image');
            $table->string('specialist_email');
            $table->string('specialist_phone');
            $table->string('specialist_academic_rank');
            $table->string('specialist_degree');
            $table->text('specialist_introduction');
            $table->text('specialist_members_of_the_organizing_committee');
            $table->text('specialist_areas_of_expertise');
            $table->text('specialist_award_title');
            $table->text('specialist_research_works');
            $table->integer('specialist_status');
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
        Schema::dropIfExists('tbl_specialist');
    }
}
