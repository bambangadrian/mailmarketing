<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTrackingStatusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'MailTrackingStatus',
            function (Blueprint $table) {
                $table->increments('Mts_ID');
                $table->string('Mts_Name', 50);
                $table->char('Mts_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Mts_CreatedOn');
                $table->timestamp('Mts_ModifiedOn')->nullable();
                $table->timestamp('Mts_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Mts_CreatedBy')->unsigned();
                $table->integer('Mts_ModifiedBy')->unsigned()->nullable();
                $table->integer('Mts_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Mts_GUID', 36);
                # Add all the table constraint.
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
        Schema::drop('MailTrackingStatus');
    }
}
