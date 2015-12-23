<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Template',
            function (Blueprint $table) {
                $table->increments('Tpl_ID');
                $table->string('Tpl_Name', 50);
                $table->string('Tpl_Description', 255)->nullable();
                $table->char('Tpl_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Tpl_CreatedOn');
                $table->timestamp('Tpl_ModifiedOn')->nullable();
                $table->timestamp('Tpl_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Tpl_CreatedBy')->unsigned();
                $table->integer('Tpl_ModifiedBy')->unsigned()->nullable();
                $table->integer('Tpl_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Tpl_GUID', 36);
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
        Schema::drop('Template');
    }
}
