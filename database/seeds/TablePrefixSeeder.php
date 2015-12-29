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
        # Seed the table.
        $tablePrefixes = [
            [
                'Tpx_TableName' => 'tbl_Campaign',
                'Tpx_Prefix'    => 'Cpg',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_CampaignCategory',
                'Tpx_Prefix'    => 'Cc',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_CampaignTopic',
                'Tpx_Prefix'    => 'Cto',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_CampaignType',
                'Tpx_Prefix'    => 'Cgt',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Company',
                'Tpx_Prefix'    => 'Cpy',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Dss',
                'Tpx_Prefix'    => 'Dss',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssAlternative',
                'Tpx_Prefix'    => 'Dal',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssAlternativeDetail',
                'Tpx_Prefix'    => 'Dad',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssCriteria',
                'Tpx_Prefix'    => 'Dcr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssCriteriaDetail',
                'Tpx_Prefix'    => 'Dcd',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssEvAlternativeCriteria',
                'Tpx_Prefix'    => 'Deac',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssRandomIndex',
                'Tpx_Prefix'    => 'Dri',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_DssResult',
                'Tpx_Prefix'    => 'Dsr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_ImportFrom',
                'Tpx_Prefix'    => 'Imf',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_MailList',
                'Tpx_Prefix'    => 'Mls',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_MailSchedule',
                'Tpx_Prefix'    => 'Msd',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_MailTracking',
                'Tpx_Prefix'    => 'Mtr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_MailTrackingStatus',
                'Tpx_Prefix'    => 'Mts',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Permission',
                'Tpx_Prefix'    => 'Pm',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_PermissionRole',
                'Tpx_Prefix'    => 'Pmr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Segment',
                'Tpx_Prefix'    => 'Seg',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_SegmentCriteria',
                'Tpx_Prefix'    => 'Sc',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_SegmentDetail',
                'Tpx_Prefix'    => 'Sed',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_SentMail',
                'Tpx_Prefix'    => 'Sm',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Subscriber',
                'Tpx_Prefix'    => 'Sbr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_SubscriberGroup',
                'Tpx_Prefix'    => 'Sbg',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_SubscriberGroupDetail',
                'Tpx_Prefix'    => 'Sgd',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_TablePrefix',
                'Tpx_Prefix'    => 'Tpx',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_Template',
                'Tpx_Prefix'    => 'Tpl',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_UserAccount',
                'Tpx_Prefix'    => 'Usr',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_UserRole',
                'Tpx_Prefix'    => 'Ur',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Tpx_TableName' => 'tbl_UserRoleDetail',
                'Tpx_Prefix'    => 'Urd',
                'Tpx_CreatedOn' => Carbon\Carbon::now(),
                'Tpx_CreatedBy' => 1,
                'Tpx_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        TablePrefix::insert($tablePrefixes);
    }
}
