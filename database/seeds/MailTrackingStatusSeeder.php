<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\MailTrackingStatus as MailTrackingStatus;

class MailTrackingStatusSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        MailTrackingStatus::truncate();
        # Seed the table.
        $mailTrackingStatuses = [
            [
                'Mts_Name'      => 'accepted',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'rejected',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'delivered',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'failed',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'opened',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'clicked',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'unsubscribed',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'complained',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'stored',
                'Mts_Active'    => 1,
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        MailTrackingStatus::insert($mailTrackingStatuses);
    }
}
