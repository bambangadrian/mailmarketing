<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberGroupDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'SubscriberGroupDetail',
            function (Blueprint $table) {
                $table->increments('Sgd_ID');
                $table->integer('Sgd_GroupID')->unsigned();
                $table->integer('Sgd_SubscriberID')->unsigned();
                $table->boolean('Sgd_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Sgd_CreatedOn');
                $table->timestamp('Sgd_ModifiedOn')->nullable();
                $table->timestamp('Sgd_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sgd_CreatedBy')->unsigned();
                $table->integer('Sgd_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sgd_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sgd_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Sgd_GroupID', 'Idx_SubscriberGroupDetail_Sgd_GroupID_SubscriberGroup_Sbg_ID')
                      ->references('Sbg_ID')
                      ->on('SubscriberGroup');
                $table->foreign('Sgd_SubscriberID', 'Idx_SubscriberGroupDetail_Sgd_SubscriberID_Subscriber_Sbr_ID')
                      ->references('Sbr_ID')
                      ->on('Subscriber');
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
        Schema::drop('SubscriberGroupDetail');
    }
}
