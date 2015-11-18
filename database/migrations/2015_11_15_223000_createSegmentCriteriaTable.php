<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentCriteriaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'SegmentCriteria',
            function (Blueprint $table) {
                $table->increments('Sc_ID');
                $table->string('Sc_Name', 50);
                $table->char('Sc_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Sc_CreatedOn');
                $table->timestamp('Sc_ModifiedOn')->nullable();
                $table->timestamp('Sc_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sc_CreatedBy')->unsigned();
                $table->integer('Sc_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sc_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sc_GUID', 36);
                # Add all the table constraint.
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('SegmentCriteria');
    }
}
