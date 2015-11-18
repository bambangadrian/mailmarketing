<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Subscriber',
            function (Blueprint $table) {
                $table->increments('Sbr_ID');
                $table->integer('Sbr_ImportFromID')->unsigned()->nullable();
                $table->string('Sbr_EmailAddress', 50);
                $table->string('Sbr_FirstName', 50);
                $table->string('Sbr_LastName', 50)->nullable();
                $table->string('Sbr_Address1', 100)->nullable();
                $table->string('Sbr_Address2', 100)->nullable();
                $table->string('Sbr_Address3', 100)->nullable();
                $table->tinyInteger('Sbr_MemberRating')->default('0');
                $table->char('Sbr_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Sbr_CreatedOn');
                $table->timestamp('Sbr_ModifiedOn')->nullable();
                $table->timestamp('Sbr_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Sbr_CreatedBy')->unsigned();
                $table->integer('Sbr_ModifiedBy')->unsigned()->nullable();
                $table->integer('Sbr_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Sbr_GUID', 36);
                # Add all the table constraint.
                $table->foreign('Sbr_ImportFromID')->references('Imf_ID')->on('ImportFrom');
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
        Schema::drop('Subscriber');
    }
}
