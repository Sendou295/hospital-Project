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
            $table->string('specialist_name');
            $table->string('product_image');
            $table->string('specialist_email');
            $table->integer('specialist_phone');
            $table->string('department');
            $table->string('academicRank');
            $table->string('degree');
            $table->text('introduction');
            $table->text('membersOfTheOrganizingCommittee');
            $table->text('areasOfExpertise');
            $table->text('awardTitle');
            $table->text('researchWorks');
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
