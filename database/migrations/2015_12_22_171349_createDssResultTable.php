<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssResultTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssResult',
            function (Blueprint $table) {
                $table->increments('Dsr_ID');
                $table->integer('Dsr_AlternativeID')->unsigned();
                $table->float('Dsr_Result', 10, 8);
                # Create all timestamps.
                $table->timestamp('Dsr_CreatedOn');
                $table->timestamp('Dsr_ModifiedOn')->nullable();
                $table->timestamp('Dsr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dsr_CreatedBy')->unsigned();
                $table->integer('Dsr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dsr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dsr_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Dsr_AlternativeID', 'Idx_DssResult_Dsr_AlternativeID_DssAlternative_Dal_ID')
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
        Schema::drop('DssResult');
    }
}
