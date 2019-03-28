<?php

use Illuminate\Database\Seeder;
use MailMarketing\Models\TablePrefix as TablePrefix;

class TablePrefixSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        TablePrefix::truncate();
        $dbTablePrefix = DB::getTablePrefix();
        # Seed the table.
        $tablePrefixes = [
            [
                'Tpx_TableName' => $dbTablePrefix . 'Campaign',
                'Tpx_Prefix'    => 'Cpg',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'CampaignCategory',
                'Tpx_Prefix'    => 'Cc',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'CampaignTopic',
                'Tpx_Prefix'    => 'Cto',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'CampaignType',
                'Tpx_Prefix'    => 'Cgt',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Company',
                'Tpx_Prefix'    => 'Cpy',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Dss',
                'Tpx_Prefix'    => 'Dss',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssAlternative',
                'Tpx_Prefix'    => 'Dal',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssAlternativeDetail',
                'Tpx_Prefix'    => 'Dad',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssCriteria',
                'Tpx_Prefix'    => 'Dcr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssCriteriaDetail',
                'Tpx_Prefix'    => 'Dcd',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssEvAlternativeCriteria',
                'Tpx_Prefix'    => 'Deac',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssRandomIndex',
                'Tpx_Prefix'    => 'Dri',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'DssResult',
                'Tpx_Prefix'    => 'Dsr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'ImportFrom',
                'Tpx_Prefix'    => 'Imf',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'MailList',
                'Tpx_Prefix'    => 'Mls',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'MailSchedule',
                'Tpx_Prefix'    => 'Msd',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'MailTracking',
                'Tpx_Prefix'    => 'Mtr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'MailTrackingStatus',
                'Tpx_Prefix'    => 'Mts',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Permission',
                'Tpx_Prefix'    => 'Pm',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'PermissionRole',
                'Tpx_Prefix'    => 'Pmr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Segment',
                'Tpx_Prefix'    => 'Seg',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'SegmentCriteria',
                'Tpx_Prefix'    => 'Sc',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'SegmentDetail',
                'Tpx_Prefix'    => 'Sed',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'SentMail',
                'Tpx_Prefix'    => 'Sm',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Subscriber',
                'Tpx_Prefix'    => 'Sbr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'SubscriberGroup',
                'Tpx_Prefix'    => 'Sbg',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'SubscriberGroupDetail',
                'Tpx_Prefix'    => 'Sgd',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'TablePrefix',
                'Tpx_Prefix'    => 'Tpx',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'Template',
                'Tpx_Prefix'    => 'Tpl',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'UserAccount',
                'Tpx_Prefix'    => 'Usr',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'UserRole',
                'Tpx_Prefix'    => 'Ur',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => $dbTablePrefix . 'UserRoleDetail',
                'Tpx_Prefix'    => 'Urd',
                'Tpx_Active'    => 1,
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        TablePrefix::insert($tablePrefixes);
    }
}
