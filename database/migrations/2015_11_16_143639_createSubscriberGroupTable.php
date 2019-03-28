<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberGroupTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'SubscriberGroup',
            function (Blueprint $table) {
                $table->increments('Sbg_ID');
                $table->integer('Sbg_MailListID')->unsigned();
                $table->integer('Sbg_ParentID')->unsigned()->nullable();
                $table->string('Sbg_Name', 50);
                $table->string('Sbg_Description', 255)->nullable();
                $table->boolean('Sbg_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Sbg_CreatedOn');
                $table->timestamp('Sbg_ModifiedOn')->nullable();
                $table->timestamp('Sbg_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sbg_CreatedBy')->unsigned();
                $table->integer('Sbg_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sbg_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sbg_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Sbg_MailListID', 'Idx_SubscriberGroup_Sbg_MailListID_MailList_Mls_ID')
                      ->references('Mls_ID')
                      ->on('MailList');
                $table->foreign('Sbg_ParentID', 'Idx_SubscriberGroup_Sbg_ParentID_SubscriberGroup_Sbg_ID')
                      ->references('Sbg_ID')
                      ->on('SubscriberGroup');
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
        Schema::drop('SubscriberGroup');
    }
}
