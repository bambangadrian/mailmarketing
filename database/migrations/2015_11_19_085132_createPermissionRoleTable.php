<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'PermissionRole',
            function (Blueprint $table) {
                $table->increments('Pmr_ID');
                $table->integer('Pmr_PermissionID')->unsigned();
                $table->integer('Pmr_RoleID')->unsigned();
                $table->boolean('Pmr_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Pmr_CreatedOn');
                $table->timestamp('Pmr_ModifiedOn')->nullable();
                $table->timestamp('Pmr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Pmr_CreatedBy')->unsigned();
                $table->integer('Pmr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Pmr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Pmr_GUID', 36);
                # Add all the table constraint.
                $table->unique(['Pmr_PermissionID', 'Pmr_RoleID'], 'Idx_PermissionRole_Pmr_PermissionID_Pmr_RoleID');
                $table->foreign('Pmr_PermissionID', 'Idx_PermissionRole_Pmr_PermissionID_Permission_Pm_ID')
                      ->references('Pm_ID')
                      ->on('Permission');
                $table->foreign('Pmr_RoleID', 'Idx_PermissionRole_Pmr_RoleID_UserRole_Ur_ID')
                      ->references('Ur_ID')
                      ->on('UserRole');
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
        Schema::drop('PermissionRole');
    }
}
