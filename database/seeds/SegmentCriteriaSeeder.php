<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\SegmentCriteria as SegmentCriteria;

class SegmentCriteriaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        SegmentCriteria::truncate();
        # Seed the table.
        $segmentCriterias = [
            [
                'Sc_Name'      => 'Adult',
                'Sc_CreatedOn' => Carbon\Carbon::now(),
                'Sc_CreatedBy' => 1,
                'Sc_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Sc_Name'      => 'Kids',
                'Sc_CreatedOn' => Carbon\Carbon::now(),
                'Sc_CreatedBy' => 1,
                'Sc_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        SegmentCriteria::insert($segmentCriterias);
    }
}
