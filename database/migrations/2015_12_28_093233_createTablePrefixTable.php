<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrefixTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'TablePrefix',
            function (Blueprint $table) {
                $table->increments('Tpx_ID');
                $table->string('Tpx_TableName', 100);
                $table->string('Tpx_Prefix', 100);
                $table->char('Tpx_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Tpx_CreatedOn');
                $table->timestamp('Tpx_ModifiedOn')->nullable();
                $table->timestamp('Tpx_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Tpx_CreatedBy')->unsigned();
                $table->integer('Tpx_ModifiedBy')->unsigned()->nullable();
                $table->integer('Tpx_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Tpx_GUID', 36);
                # Add all the table constraint.
                $table->unique('Tpx_TableName', 'Idx_TablePrefix_Tpx_TableName_Unique');
                $table->unique('Tpx_Prefix', 'Idx_TablePrefix_Tpx_Prefix_Unique');
                $table->foreign('Tpx_CreatedBy', 'Idx_TablePrefix_Tpx_CreatedBy_Dss_Dss_ID')
                      ->references('Usr_ID')
                      ->on('UserAccount');
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
        Schema::drop('TablePrefix');
    }
}
