<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\DssCriteria as DssCriteria;

class DssCriteriaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        DssCriteria::truncate();
        # Seed the table.
        $dssCriteria = [
            [
                'Dcr_DssID'       => 1,
                'Dcr_Name'        => 'Sent Frequency',
                'Dcr_Description' => 'The amount number of sent campaign topic frequency',
                'Dcr_Active'      => 1,
                'Dcr_CreatedOn'   => Carbon\Carbon::now(),
                'Dcr_CreatedBy'   => 1,
                'Dcr_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Dcr_DssID'       => 1,
                'Dcr_Name'        => 'Subscriber Open',
                'Dcr_Description' => 'The amount number of subscriber that open the specific campaign topic',
                'Dcr_Active'      => 1,
                'Dcr_CreatedOn'   => Carbon\Carbon::now(),
                'Dcr_CreatedBy'   => 1,
                'Dcr_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Dcr_DssID'       => 1,
                'Dcr_Name'        => 'Mitra Reach',
                'Dcr_Description' => 'The percentage of mitra reach based on the campaign topic',
                'Dcr_Active'      => 1,
                'Dcr_CreatedOn'   => Carbon\Carbon::now(),
                'Dcr_CreatedBy'   => 1,
                'Dcr_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Dcr_DssID'       => 1,
                'Dcr_Name'        => 'Subscriber Click',
                'Dcr_Description' => 'The amount number of subscriber that click the spesific campaign topic',
                'Dcr_Active'      => 1,
                'Dcr_CreatedOn'   => Carbon\Carbon::now(),
                'Dcr_CreatedBy'   => 1,
                'Dcr_GUID'        => (string)Uuid::generate(4)
            ]
        ];
        DssCriteria::insert($dssCriteria);
    }
}
