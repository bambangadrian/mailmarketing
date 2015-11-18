<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'UserRoleDetail',
            function (Blueprint $table) {
                $table->increments('Urd_ID');
                $table->integer('Urd_UserID')->unsigned();
                $table->integer('Urd_RoleID')->unsigned();
                $table->char('Urd_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Urd_CreatedOn');
                $table->timestamp('Urd_ModifiedOn')->nullable();
                $table->timestamp('Urd_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Urd_CreatedBy')->unsigned();
                $table->integer('Urd_ModifiedBy')->unsigned()->nullable();
                $table->integer('Urd_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Urd_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Urd_UserID')->references('Usr_ID')->on('UserAccount');
                $table->foreign('Urd_RoleID')->references('Ur_ID')->on('UserRole');
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
        Schema::drop('UserRoleDetail');
    }
}
