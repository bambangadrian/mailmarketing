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
                $table->char('Sgd_Active', 1)->default('Y');
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
                $table->foreign('Sgd_GroupID')->references('Sbg_ID')->on('SubscriberGroup');
                $table->foreign('Sgd_SubscriberID')->references('Sbr_ID')->on('Subscriber');
                $table->unique(['Sgd_GroupID', 'Sgd_SubscriberID']);
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