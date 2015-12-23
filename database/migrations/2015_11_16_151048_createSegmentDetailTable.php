<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'SegmentDetail',
            function (Blueprint $table) {
                $table->increments('Sed_ID');
                $table->integer('Sed_SegmentID')->unsigned();
                $table->integer('Sed_SegmentCriteriaID')->unsigned();
                $table->char('Sed_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Sed_CreatedOn');
                $table->timestamp('Sed_ModifiedOn')->nullable();
                $table->timestamp('Sed_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sed_CreatedBy')->unsigned();
                $table->integer('Sed_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sed_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sed_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Sed_SegmentID', 'Idx_SegmentDetail_Sed_SegmentID_Segment_Seg_ID')
                      ->references('Seg_ID')
                      ->on('Segment');
                $table->foreign('Sed_SegmentCriteriaID', 'Idx_SegmentDetail_Sed_SegmentCriteriaID_SegmentCriteria_Sc_ID')
                      ->references('Sc_ID')
                      ->on('SegmentCriteria');
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
        Schema::drop('SegmentDetail');
    }
}
