<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssRandomIndexTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssRandomIndex',
            function (Blueprint $table) {
                $table->increments('Dri_ID');
                $table->integer('Dri_NumberColumn');
                $table->float('Dri_RandomIndex', 4, 2);
                $table->char('Dri_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Dri_CreatedOn');
                $table->timestamp('Dri_ModifiedOn')->nullable();
                $table->timestamp('Dri_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dri_CreatedBy')->unsigned();
                $table->integer('Dri_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dri_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dri_GUID', 36);
                # Add all the table constraint.
            }
        );
        Schema::table(
            'Dss',
            function (Blueprint $table) {
                $table->integer('Dss_RandomIndexID')->unsigned()->nullable()->after('Dss_ID');
                $table->foreign('Dss_RandomIndexID', 'Idx_Dss_Dss_RandomIndexID_DssRandomIndex_Dri_ID')
                      ->references('Dri_ID')
                      ->on('DssRandomIndex');
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
        Schema::table(
            'Dss',
            function (Blueprint $table) {
                $table->dropForeign('Idx_Dss_Dss_RandomIndexID_DssRandomIndex_Dri_ID');
                $table->dropColumn('Dss_RandomIndexID');
            }
        );
        Schema::drop('DssRandomIndex');
    }
}
