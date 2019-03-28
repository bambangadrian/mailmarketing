<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\ImportFrom as ImportFrom;

class ImportFromSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        ImportFrom::truncate();
        # Seed the table.
        $importFrom = [
            [
                'Imf_Name'        => 'Old Database',
                'Imf_Description' => 'Import from old database',
                'Imf_Active'      => 1,
                'Imf_CreatedOn'   => Carbon\Carbon::now(),
                'Imf_CreatedBy'   => 1,
                'Imf_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Imf_Name'        => 'Excel',
                'Imf_Description' => 'Import from excel',
                'Imf_Active'      => 1,
                'Imf_CreatedOn'   => Carbon\Carbon::now(),
                'Imf_CreatedBy'   => 1,
                'Imf_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Imf_Name'        => 'Register',
                'Imf_Description' => 'Registered subscriber',
                'Imf_Active'      => 1,
                'Imf_CreatedOn'   => Carbon\Carbon::now(),
                'Imf_CreatedBy'   => 1,
                'Imf_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Imf_Name'        => 'Manual Input',
                'Imf_Description' => 'Manual input subscriber registration',
                'Imf_Active'      => 1,
                'Imf_CreatedOn'   => Carbon\Carbon::now(),
                'Imf_CreatedBy'   => 1,
                'Imf_GUID'        => (string)Uuid::generate(4)
            ]
        ];
        ImportFrom::insert($importFrom);
    }
}
