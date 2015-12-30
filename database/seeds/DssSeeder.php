<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\Dss as Dss;

class DssSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        Dss::truncate();
        # Seed the table.
        $dss = [
            [
                'Dss_Name'        => 'Intense Topic',
                'Dss_Description' => 'Choose the campaign topic that must be more strengthen',
                'Dss_Active'      => 1,
                'Dss_CreatedOn'   => Carbon\Carbon::now(),
                'Dss_CreatedBy'   => 1,
                'Dss_GUID'        => (string)Uuid::generate(4)
            ]
        ];
        Dss::insert($dss);
    }
}
