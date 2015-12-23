<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTopicTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'CampaignTopic',
            function (Blueprint $table) {
                $table->increments('Cto_ID');
                $table->string('Cto_Name', 50);
                $table->char('Cto_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Cto_CreatedOn');
                $table->timestamp('Cto_ModifiedOn')->nullable();
                $table->timestamp('Cto_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Cto_CreatedBy')->unsigned();
                $table->integer('Cto_ModifiedBy')->unsigned()->nullable();
                $table->integer('Cto_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Cto_GUID', 36);
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
        Schema::drop('CampaignTopic');
    }
}
