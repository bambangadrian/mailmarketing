<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForMailGunIntegration extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'MailList',
            function (Blueprint $table) {
                # Add access level field column.
                $table->enum('Mls_AccessLevel', ['readonly', 'members', 'everyone'])
                      ->default('readonly')
                      ->after('Mls_Phone');
            }
        );
        Schema::table(
            'Subscriber',
            function (Blueprint $table) {
                # Add birthday, phone, and alternative phone fields column.
                $table->date('Sbr_BirthDay')->after('Sbr_LastName')->nullable();
                $table->char('Sbr_Phone', 15)->after('Sbr_Address3')->nullable();
                $table->char('Sbr_AltPhone', 15)->after('Sbr_Phone')->nullable();
            }
        );
        Schema::table(
            'SubscriberGroupDetail',
            function (Blueprint $table) {
                # Add subscribed via and date field column.
                $table->date('Sgd_SubscribedOn')->after('Sgd_Active');
                $table->enum('Sgd_SubscribedVia', ['register', 'admin', 'export'])
                      ->after('Sgd_SubscriberID');
            }
        );
        Schema::table(
            'MailTracking',
            function (Blueprint $table) {
                $table->dropColumn('Mtr_Location')->nullable();
                $table->json('Mtr_MessageHeaders')->after('Mtr_IpAddress')->nullable();
                $table->string('Mtr_MessageId', 50)->after('Mtr_MessageHeaders')->nullable();
                $table->string('Mtr_Reason', 100)->after('Mtr_MessageId')->nullable();
                $table->string('Mtr_Code', 50)->after('Mtr_Reason')->nullable();
                $table->string('Mtr_Error', 50)->after('Mtr_Code')->nullable();
                $table->string('Mtr_Description', 100)->after('Mtr_Error')->nullable();
                $table->string('Mtr_DomainSender', 50)->after('Mtr_Description')->nullable();
                $table->string('Mtr_Country', 50)->after('Mtr_DomainSender')->nullable();
                $table->string('Mtr_Region', 50)->after('Mtr_Country')->nullable();
                $table->string('Mtr_City', 50)->after('Mtr_Region')->nullable();
                $table->string('Mtr_ClickedUrl', 255)->after('Mtr_City')->nullable();
                $table->string('Mtr_DeviceType', 50)->after('Mtr_ClickedUrl')->nullable();
                $table->string('Mtr_ClientType', 50)->after('Mtr_DeviceType')->nullable();
                $table->string('Mtr_ClientName', 50)->after('Mtr_ClientType')->nullable();
                $table->string('Mtr_ClientOs', 50)->after('Mtr_ClientName')->nullable();
                $table->string('Mtr_Token', 50)->after('Mtr_ClientOs')->nullable();
                $table->string('Mtr_Signature', 50)->after('Mtr_Token')->nullable();
                $table->string('Mtr_CustomVariable', 255)->after('Mtr_Signature')->nullable();
                $table->timestamp('Mtr_TimeStamp')->after('Mtr_CustomVariable')->nullable();
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
            'MailList',
            function (Blueprint $table) {
                # Drop access level field column.
                $table->dropColumn('Mls_AccessLevel');
            }
        );
        Schema::table(
            'Subscriber',
            function (Blueprint $table) {
                $table->dropColumn(['Sbr_BirthDay', 'Sbr_Phone', 'Sbr_AltPhone']);
            }
        );
        Schema::table(
            'SubscriberGroupDetail',
            function (Blueprint $table) {
                $table->dropColumn(['Sgd_SubscribedOn', 'Sgd_SubscribedVia']);
            }
        );
        Schema::table(
            'MailTracking',
            function (Blueprint $table) {
                $table->string('Mtr_Location', 100)->nullable();
                $table->dropColumn([
                    'Mtr_MessageHeaders',
                    'Mtr_MessageId',
                    'Mtr_Reason',
                    'Mtr_Code',
                    'Mtr_Error',
                    'Mtr_Description',
                    'Mtr_DomainSender',
                    'Mtr_Country',
                    'Mtr_Region',
                    'Mtr_City',
                    'Mtr_ClickedUrl',
                    'Mtr_DeviceType',
                    'Mtr_ClientType',
                    'Mtr_ClientName',
                    'Mtr_ClientOs',
                    'Mtr_Token',
                    'Mtr_Signature',
                    'Mtr_CustomVariable',
                    'Mtr_TimeStamp'
                ]);
            }
        );
    }
}
