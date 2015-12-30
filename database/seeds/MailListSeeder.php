<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\MailList as MailList;

class MailListSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        MailList::truncate();
        # Seed the table.
        $mailList = [
            [
                'Mls_Name'             => 'Jawaban Mailing List (Monthly)',
                'Mls_EmailAddressFrom' => 'mailmaster@jawaban.com',
                'Mls_EmailNameFrom'    => 'Webmaster Jawaban.com',
                'Mls_Reminder'         => 'Y',
                'Mls_CompanyName'      => 'CBN Indonesia',
                'Mls_Address1'         => 'Jl. Sriwijaya Kavling 5-7',
                'Mls_Address2'         => 'Lippo Cikarang',
                'Mls_City'             => 'Kab. Bekasi',
                'Mls_Active'           => 1,
                'Mls_Country'          => 'Indonesia',
                'Mls_Phone'            => '0218888888',
                'Mls_NotifType'        => 'All',
                'Mls_CreatedOn'        => Carbon\Carbon::now(),
                'Mls_CreatedBy'        => 1,
                'Mls_GUID'             => (string)Uuid::generate(4)
            ]
        ];
        MailList::insert($mailList);
    }
}
