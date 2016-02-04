<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTrackingTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'MailTracking',
            function (Blueprint $table) {
                $table->increments('Mtr_ID');
                $table->integer('Mtr_SentMailID')->unsigned()->nullable();
                $table->integer('Mtr_StatusID')->unsigned()->nullable();
                $table->string('Mtr_UserAgent', 255)->nullable();
                $table->string('Mtr_Location', 100)->nullable();
                $table->char('Mtr_IpAddress', 15)->nullable();
                # Create all timestamps.
                $table->timestamp('Mtr_CreatedOn');
                $table->timestamp('Mtr_ModifiedOn')->nullable();
                $table->timestamp('Mtr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Mtr_CreatedBy')->unsigned();
                $table->integer('Mtr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Mtr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Mtr_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Mtr_SentMailID', 'Idx_MailTracking_Mtr_SentMailID_SentMail_Sm_ID')
                      ->references('Sm_ID')
                      ->on('SentMail');
                $table->foreign('Mtr_StatusID', 'Idx_MailTracking_Mtr_StatusID_MailTrackingStatus_Mts_ID')
                      ->references('Mts_ID')
                      ->on('MailTrackingStatus');
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
        Schema::drop('MailTracking');
    }
}
