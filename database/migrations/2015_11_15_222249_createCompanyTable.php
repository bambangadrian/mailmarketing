<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'Company',
            function (Blueprint $table) {
                $table->increments('Cpy_ID');
                $table->string('Cpy_Name', 50);
                $table->string('Cpy_Email', 50);
                $table->string('Cpy_WebsiteUrl', 100);
                $table->string('Cpy_Address1', 100)->nullalble();
                $table->string('Cpy_Address2', 100)->nullable();
                $table->string('Cpy_City', 25)->nullable();
                $table->char('Cpy_PostCode', 6)->nullable();
                $table->string('Cpy_Country', 25)->nullable();
                $table->string('Cpy_TimeZone', 15);
                $table->char('Cpy_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Cpy_CreatedOn');
                $table->timestamp('Cpy_ModifiedOn')->nullable();
                $table->timestamp('Cpy_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Cpy_CreatedBy')->unsigned();
                $table->integer('Cpy_ModifiedBy')->unsigned()->nullable();
                $table->integer('Cpy_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Cpy_GUID', 36);
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
        Schema::drop('Company');
    }
}
