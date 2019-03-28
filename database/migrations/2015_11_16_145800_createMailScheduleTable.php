<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailScheduleTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'MailSchedule',
			function (Blueprint $table) {
				$table->increments('Msd_ID');
				$table->integer('Msd_CampaignID')->unsigned();
				$table->integer('Msd_SubscriberGroupID')->unsigned();
				$table->dateTime('Msd_ExecutedDate');
				$table->boolean('Msd_IsExecuted')->default(0);
				$table->boolean('Msd_Active')->default(0);
				# Create all timestamps.
				$table->timestamp('Msd_CreatedOn');
				$table->timestamp('Msd_ModifiedOn')->nullable();
				$table->timestamp('Msd_DeletedOn')->nullable();
				# Create all user modifier.
				$table->integer('Msd_CreatedBy')->unsigned();
				$table->integer('Msd_ModifiedBy')->unsigned()->nullable();
				$table->integer('Msd_DeletedBy')->unsigned()->nullable();
				# Add the uuid column field.
				$table->char('Msd_GUID', 36);
				# Add all the table constraint.
				$table->foreign('Msd_CampaignID', 'Idx_MailSchedule_Msd_CampaignID_Campaign_Cpg_ID')
					  ->references('Cpg_ID')
					  ->on('Campaign');
				$table->foreign('Msd_SubscriberGroupID', 'Idx_MailSchedule_Msd_SubscriberGroupID_SubscriberGroup_Sbg_ID')
					  ->references('Sbg_ID')
					  ->on('SubscriberGroup');
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
		Schema::drop('MailSchedule');
	}
}
