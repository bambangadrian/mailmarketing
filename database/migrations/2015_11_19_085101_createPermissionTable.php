<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Permission',
            function (Blueprint $table) {
                $table->increments('Pm_ID');
                $table->string('Pm_Name', 100);
                $table->string('Pm_Slug', 50);
                $table->string('Pm_Description', 255)->nullable();
                $table->boolean('Pm_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Pm_CreatedOn');
                $table->timestamp('Pm_ModifiedOn')->nullable();
                $table->timestamp('Pm_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Pm_CreatedBy')->unsigned();
                $table->integer('Pm_ModifiedBy')->unsigned()->nullable();
                $table->integer('Pm_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Pm_GUID', 36);
                # Add all the table constraint.
                $table->unique('Pm_Slug', 'Idx_Permission_Pm_Slug');
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
        Schema::drop('Permission');
    }
}
