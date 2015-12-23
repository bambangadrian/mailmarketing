<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssCriteriaDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssCriteriaDetail',
            function (Blueprint $table) {
                $table->increments('Dcd_ID');
                $table->integer('Dcd_CriteriaID')->unsigned();
                $table->integer('Dcd_CompareID')->unsigned();
                $table->float('Dcd_ComparisonMatrixValue', 10, 8)->default(1);
                # Create all timestamps.
                $table->timestamp('Dcd_CreatedOn');
                $table->timestamp('Dcd_ModifiedOn')->nullable();
                $table->timestamp('Dcd_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dcd_CreatedBy')->unsigned();
                $table->integer('Dcd_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dcd_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dcd_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Dcd_CriteriaID', 'Idx_DssCriteriaDetail_Dcd_CriteriaID_DssCriteria_Dcr_ID')
                      ->references('Dcr_ID')
                      ->on('DssCriteria');
                $table->foreign('Dcd_CompareID', 'Idx_DssCriteriaDetail_Dcd_CompareID_DssCriteria_Dcr_ID')
                      ->references('Dcr_ID')
                      ->on('DssCriteria');
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
        Schema::drop('DssCriteriaDetail');
    }
}
