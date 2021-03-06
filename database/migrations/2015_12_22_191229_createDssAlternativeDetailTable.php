<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssAlternativeDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssAlternativeDetail',
            function (Blueprint $table) {
                $table->increments('Dad_ID');
                $table->integer('Dad_EigenID')->unsigned();
                $table->integer('Dad_CompareID')->unsigned();
                $table->float('Dad_ComparisonMatrixValue', 10, 8)->default(1);
                # Create all timestamps.
                $table->timestamp('Dad_CreatedOn');
                $table->timestamp('Dad_ModifiedOn')->nullable();
                $table->timestamp('Dad_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dad_CreatedBy')->unsigned();
                $table->integer('Dad_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dad_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dad_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Dad_EigenID', 'Idx_DssAlternativeDetail_Dad_EigenID_DssEv_Deac_ID')
                      ->references('Deac_ID')
                      ->on('DssEvAlternativeCriteria');
                $table->foreign('Dad_CompareID', 'Idx_DssAlternativeDetail_Dad_CompareID_DssAlternative_Dal_ID')
                      ->references('Dal_ID')
                      ->on('DssAlternative');
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
        Schema::drop('DssAlternativeDetail');
    }
}
