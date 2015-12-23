<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssAlternativeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'DssAlternative',
            function (Blueprint $table) {
                $table->increments('Dal_ID');
                $table->integer('Dal_DssID')->unsigned();
                $table->string('Dal_Name', 100);
                $table->char('Dal_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Dal_CreatedOn');
                $table->timestamp('Dal_ModifiedOn')->nullable();
                $table->timestamp('Dal_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dal_CreatedBy')->unsigned();
                $table->integer('Dal_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dal_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dal_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Dal_DssID', 'Idx_DssAlternative_Dal_DssID_Dss_Dss_ID')
                      ->references('Dss_ID')
                      ->on('Dss');
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
        Schema::drop('DssAlternative');
    }
}
