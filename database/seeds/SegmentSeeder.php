<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\Segment as Segment;

class SegmentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        Segment::truncate();
        # Seed the table.
        $segments = [
            [
                'Seg_Name'      => 'Age',
                'Seg_CreatedOn' => Carbon\Carbon::now(),
                'Seg_CreatedBy' => 1,
                'Seg_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Seg_Name'      => 'Location',
                'Seg_CreatedOn' => Carbon\Carbon::now(),
                'Seg_CreatedBy' => 1,
                'Seg_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        Segment::insert($segments);
    }
}
