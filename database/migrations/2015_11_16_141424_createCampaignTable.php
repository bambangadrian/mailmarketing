<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Campaign',
            function (Blueprint $table) {
                $table->increments('Cpg_ID');
                $table->integer('Cpg_TypeID')->unsigned();
                $table->integer('Cpg_TemplateID')->unsigned()->nullable();
                $table->string('Cpg_Name', 50);
                $table->string('Cpg_EmailSubject', 255)->nullable();
                $table->string('Cpg_EmailAddressFrom', 50)->nullable();
                $table->string('Cpg_EmailNameFrom', 50)->nullable();
                $table->text('Cpg_Content')->nullable();
                $table->char('Cpg_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Cpg_CreatedOn');
                $table->timestamp('Cpg_ModifiedOn')->nullable();
                $table->timestamp('Cpg_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Cpg_CreatedBy')->unsigned();
                $table->integer('Cpg_ModifiedBy')->unsigned()->nullable();
                $table->integer('Cpg_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Cpg_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Cpg_TypeID', 'Idx_Campaign_Cpg_TypeID_CampaignType_Cgt_ID')
                      ->references('Cgt_ID')
                      ->on('CampaignType');
                $table->foreign('Cpg_TemplateID', 'Idx_Campaign_Cpg_TemplateID_Template_Tpl_ID')
                      ->references('Tpl_ID')
                      ->on('Template');
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
        Schema::drop('Campaign');
    }
}
