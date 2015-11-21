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
                'Mts_Name'      => 'open',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'read',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'click',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'subscribe',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'unsubscribe',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'bounce',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Mts_Name'      => 'fail',
                'Mts_CreatedOn' => Carbon\Carbon::now(),
                'Mts_CreatedBy' => 1,
                'Mts_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        MailTrackingStatus::insert($mailTrackingStatuses);
    }
}
