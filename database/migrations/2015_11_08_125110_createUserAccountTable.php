<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'UserAccount',
            function (Blueprint $table) {
                $table->increments('Usr_ID');
                $table->string('Usr_Name', 50);
                $table->string('Usr_Email', 50);
                $table->char('Usr_Password', 128);
                $table->char('Usr_Token', 128)->nullable();
                $table->boolean('Usr_Active')->default(0);
                # Create all timestamps.
                $table->timestamp('Usr_CreatedOn');
                $table->timestamp('Usr_ModifiedOn')->nullable();
                $table->timestamp('Usr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Usr_CreatedBy')->unsigned();
                $table->integer('Usr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Usr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Usr_GUID', 36);
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
        Schema::drop('UserAccount');
    }
}
