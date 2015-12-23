<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailListTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'MailList',
            function (Blueprint $table) {
                $table->increments('Mls_ID');
                $table->string('Mls_Name', 50);
                $table->string('Mls_EmailAddressFrom', 50);
                $table->string('Mls_EmailNameFrom', 50);
                $table->text('Mls_Reminder')->nullable();
                $table->string('Mls_CompanyName', 50);
                $table->string('Mls_Address1', 100)->nullable();
                $table->string('Mls_Address2', 100)->nullable();
                $table->string('Mls_City', 25)->nullable();
                $table->string('Mls_Country', 25)->nullable();
                $table->char('Mls_Phone', 15)->nullable();
                $table->char('Mls_NotifType', 1)->nullable();
                $table->char('Mls_Active', 1)->default('Y');
                # Create all timestamps.
                $table->timestamp('Mls_CreatedOn');
                $table->timestamp('Mls_ModifiedOn')->nullable();
                $table->timestamp('Mls_DeletedOn')->nullable();
                # Create all user modifier.
                $table->integer('Mls_CreatedBy')->unsigned();
                $table->integer('Mls_ModifiedBy')->unsigned()->nullable();
                $table->integer('Mls_DeletedBy')->unsigned()->nullable();
                # Add the uuid column field.
                $table->char('Mls_GUID', 36);
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
        Schema::drop('MailList');
    }
}
