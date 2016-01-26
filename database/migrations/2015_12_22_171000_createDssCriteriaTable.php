<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssCriteriaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssCriteria',
            function (Blueprint $table) {
                $table->increments('Dcr_ID');
                $table->integer('Dcr_DssID')->unsigned();
                $table->string('Dcr_Name', 100);
                $table->string('Dcr_Description', 255)->nullable();
                $table->float('Dcr_EigenVector', 10, 8)->nullable();
                $table->float('Dcr_MatrixTotal', 10, 8)->nullable();
                $table->boolean('Dcr_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Dcr_CreatedOn');
                $table->timestamp('Dcr_ModifiedOn')->nullable();
                $table->timestamp('Dcr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dcr_CreatedBy')->unsigned();
                $table->integer('Dcr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dcr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dcr_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Dcr_DssID', 'Idx_DssCriteria_Dcr_DssID_Dss_Dss_ID')
                      ->references('Dss_ID')
                      ->on('Dss');
                $table->unique(['Dcr_DssID', 'Dcr_Name'], 'Idx_DssCriteria_Dcr_DssID_Dcr_Name');
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
        Schema::drop('DssCriteria');
    }
}
