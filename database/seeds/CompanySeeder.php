<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\Company as Company;

class CompanySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        Company::truncate();
        # Seed the table.
        $company = [
            [
                'Cpy_Name'       => 'Cahaya Bagi Negri (CBN Indonesia)',
                'Cpy_Email'      => 'mailmarketing@cbn.or.id',
                'Cpy_WebsiteUrl' => 'http://www.jawaban.com',
                'Cpy_Address1'   => 'Jl. Sriwijaya Kavling 5-7',
                'Cpy_Address2'   => 'Lippo Cikarang, Cikarang Selatan',
                'Cpy_City'       => 'Kabupaten Bekasi',
                'Cpy_PostCode'   => '17550',
                'Cpy_Country'    => 'Indonesia',
                'Cpy_TimeZone'   => 'Asia/Jakarta',
                'Cpy_CreatedOn'  => Carbon\Carbon::now(),
                'Cpy_CreatedBy'  => 1,
                'Cpy_GUID'       => (string)Uuid::generate(4)
            ]
        ];
        Company::insert($company);
    }
}
