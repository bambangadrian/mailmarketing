<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTypeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'CampaignType',
            function (Blueprint $table) {
                $table->increments('Cgt_ID');
                $table->string('Cgt_Name', 50);
                $table->char('Cgt_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Cgt_CreatedOn');
                $table->timestamp('Cgt_ModifiedOn')->nullable();
                $table->timestamp('Cgt_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Cgt_CreatedBy')->unsigned();
                $table->integer('Cgt_ModifiedBy')->unsigned()->nullable();
                $table->integer('Cgt_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Cgt_GUID', 36);
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
        Schema::drop('CampaignType');
    }
}
