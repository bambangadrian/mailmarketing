<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentMailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'SentMail',
            function (Blueprint $table) {
                $table->increments('Sm_ID');
                $table->integer('Sm_MailScheduleID')->unsigned();
                $table->integer('Sm_SubscriberListID')->unsigned();
                $table->char('Sm_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Sm_CreatedOn');
                $table->timestamp('Sm_ModifiedOn')->nullable();
                $table->timestamp('Sm_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sm_CreatedBy')->unsigned();
                $table->integer('Sm_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sm_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sm_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Sm_MailScheduleID', 'Idx_SentMail_Sm_MailScheduleID_MailSchedule_Msd_ID')
                      ->references('Msd_ID')
                      ->on('MailSchedule');
                $table->foreign('Sm_SubscriberListID', 'Idx_SentMail_Sm_SubscriberListID_SubscriberGroupDetail_Sgd_ID')
                      ->references('Sgd_ID')
                      ->on('SubscriberGroupDetail');
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
        Schema::drop('SentMail');
    }
}
