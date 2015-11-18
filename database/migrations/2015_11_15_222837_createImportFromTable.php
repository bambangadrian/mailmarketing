<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportFromTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ImportFrom',
            function (Blueprint $table) {
                $table->increments('Imf_ID');
                $table->string('Imf_Name', 50);
                $table->string('Imf_Description', 255)->nullable();
                $table->char('Imf_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Imf_CreatedOn');
                $table->timestamp('Imf_ModifiedOn')->nullable();
                $table->timestamp('Imf_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Imf_CreatedBy')->unsigned();
                $table->integer('Imf_ModifiedBy')->unsigned()->nullable();
                $table->integer('Imf_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Imf_GUID', 36);
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
        Schema::drop('ImportFrom');
    }
}
