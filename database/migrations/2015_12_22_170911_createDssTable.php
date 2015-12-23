<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDssTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Dss',
            function (Blueprint $table) {
                $table->increments('Dss_ID');
                $table->string('Dss_Name', 100);
                $table->string('Dss_Description', 255)->nullable();
                $table->date('Dss_StartPeriod')->nullable();
                $table->date('Dss_EndPeriod')->nullable();
                $table->float('Dss_CriteriaEigenValue', 10, 8)->nullable();
                $table->float('Dss_CriteriaConsistencyIndex', 10, 8)->nullable();
                $table->float('Dss_CriteriaConsistencyRatio', 10, 8)->nullable();
                $table->char('Dss_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Dss_RunOn')->nullable();
                $table->timestamp('Dss_CreatedOn');
                $table->timestamp('Dss_ModifiedOn')->nullable();
                $table->timestamp('Dss_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Dss_CreatedBy')->unsigned();
                $table->integer('Dss_ModifiedBy')->unsigned()->nullable();
                $table->integer('Dss_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Dss_GUID', 36);
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
        Schema::drop('Dss');
    }
}
