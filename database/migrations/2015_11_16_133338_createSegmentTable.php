<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Segment',
            function (Blueprint $table) {
                $table->increments('Seg_ID');
                $table->string('Seg_Name', 50);
                $table->char('Seg_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Seg_CreatedOn');
                $table->timestamp('Seg_ModifiedOn')->nullable();
                $table->timestamp('Seg_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Seg_CreatedBy')->unsigned();
                $table->integer('Seg_ModifiedBy')->unsigned()->nullable();
                $table->integer('Seg_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Seg_GUID', 36);
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
        Schema::drop('Segment');
    }
}
