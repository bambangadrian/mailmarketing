<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'UserRole',
            function (Blueprint $table) {
                $table->increments('Ur_ID');
                $table->string('Ur_Name', 50);
                $table->string('Ur_Slug', 50)->unique();
                $table->char('Ur_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Ur_CreatedOn');
                $table->timestamp('Ur_ModifiedOn')->nullable();
                $table->timestamp('Ur_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Ur_CreatedBy')->unsigned();
                $table->integer('Ur_ModifiedBy')->unsigned()->nullable();
                $table->integer('Ur_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Ur_GUID', 36);
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
        Schema::drop('UserRole');
    }
}
