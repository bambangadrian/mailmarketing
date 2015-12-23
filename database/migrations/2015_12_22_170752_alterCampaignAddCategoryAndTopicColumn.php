<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignAddCategoryAndTopicColumn extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'Campaign',
            function (Blueprint $table) {
                $table->integer('Cpg_CategoryID')->unsigned()->after('Cpg_TypeID');
                $table->integer('Cpg_TopicID')->unsigned()->after('Cpg_CategoryID');
                # Add all the table constraint.
                $table->foreign('Cpg_CreatedBy', 'Idx_Campaign_Cpg_CreatedBy_UserAccount_Usr_ID')
                      ->references('Usr_ID')
                      ->on('UserAccount');
                $table->foreign('Cpg_CategoryID', 'Idx_Campaign_Cpg_CategoryID_CampaignCategory_Cc_ID')
                      ->references('Cc_ID')
                      ->on('CampaignCategory');
                $table->foreign('Cpg_TopicID', 'Idx_Campaign_Cpg_TopicID_CampaignTopic_Cto_ID')
                      ->references('Cto_ID')
                      ->on('CampaignTopic');
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
        Schema::table(
            'Campaign',
            function (Blueprint $table) {
                $table->dropForeign('Idx_Campaign_Cpg_TopicID_CampaignTopic_Cto_ID');
                $table->dropForeign('Idx_Campaign_Cpg_CategoryID_CampaignCategory_Cc_ID');
                $table->dropForeign('Idx_Campaign_Cpg_CreatedBy_UserAccount_Usr_ID');
                $table->dropColumn('Cpg_CategoryID');
                $table->dropColumn('Cpg_TopicID');
            }
        );
    }
}
