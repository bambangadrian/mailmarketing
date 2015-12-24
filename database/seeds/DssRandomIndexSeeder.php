<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\DssRandomIndex as DssRandomIndex;

class DssRandomIndexSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        DssRandomIndex::truncate();
        # Seed the table.
        $dssRandomIndex = [
            [
                'Dri_NumberColumn' => 1,
                'Dri_RandomIndex'  => 0,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 2,
                'Dri_RandomIndex'  => 0,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 3,
                'Dri_RandomIndex'  => 0.58,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 4,
                'Dri_RandomIndex'  => 0.90,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 5,
                'Dri_RandomIndex'  => 1.12,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 6,
                'Dri_RandomIndex'  => 1.24,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 7,
                'Dri_RandomIndex'  => 1.32,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 8,
                'Dri_RandomIndex'  => 1.41,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 9,
                'Dri_RandomIndex'  => 1.45,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Dri_NumberColumn' => 10,
                'Dri_RandomIndex'  => 1.49,
                'Dri_CreatedOn'    => Carbon\Carbon::now(),
                'Dri_CreatedBy'    => 1,
                'Dri_GUID'         => (string)Uuid::generate(4)
            ]
        ];
        DssRandomIndex::insert($dssRandomIndex);
    }
}
