<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssEvAlternativeCriteriaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssEvAlternativeCriteria',
            function (Blueprint $table) {
                $table->increments('Deac_ID');
                $table->integer('Deac_CriteriaID')->unsigned();
                $table->integer('Deac_AlternativeID')->unsigned();
                $table->float('Deac_EigenVector', 10, 8)->nullable();
                $table->float('Deac_MatrixTotal', 10, 8)->nullable();
                # Create all timestamps.
                $table->timestamp('Deac_CreatedOn');
                $table->timestamp('Deac_ModifiedOn')->nullable();
                $table->timestamp('Deac_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Deac_CreatedBy')->unsigned();
                $table->integer('Deac_ModifiedBy')->unsigned()->nullable();
                $table->integer('Deac_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Deac_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Deac_CriteriaID', 'Idx_DssEv_Deac_CriteriaID_DssCriteria_Dcr_ID')
                      ->references('Dcr_ID')
                      ->on('DssCriteria');
                $table->foreign('Deac_AlternativeID', 'Idx_DssEv_Deac_AlternativeID_DssAlternative_Dal_ID')
                      ->references('Dal_ID')
                      ->on('DssAlternative');
                $table->unique(['Deac_CriteriaID', 'Deac_AlternativeID'], 'Idx_DssEv_Deac_CriteriaID_Deac_AlternativeID');
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
        Schema::drop('DssEvAlternativeCriteria');
    }
}
