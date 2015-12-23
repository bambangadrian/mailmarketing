<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignCategoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'CampaignCategory',
            function (Blueprint $table) {
                $table->increments('Cc_ID');
                $table->string('Cc_Name', 50);
                $table->char('Cc_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Cc_CreatedOn');
                $table->timestamp('Cc_ModifiedOn')->nullable();
                $table->timestamp('Cc_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Cc_CreatedBy')->unsigned();
                $table->integer('Cc_ModifiedBy')->unsigned()->nullable();
                $table->integer('Cc_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Cc_GUID', 36);
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
        Schema::drop('CampaignCategory');
    }
}
