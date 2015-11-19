<?php

use Illuminate\Database\Seeder;
use MailMarketing\Models\UserAccount as UserAccount;

class UserAccountSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        UserAccount::truncate();
        # Seed the table.
        $userAccounts = [
            [
                'Usr_Name'      => 'Administrator',
                'Usr_Email'     => 'bambang.adrian@gmail.com',
                'Usr_Password'  => bcrypt('optilog2014'),
                'Usr_CreatedOn' => Carbon\Carbon::now(),
                'Usr_CreatedBy' => 1,
                'Usr_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Usr_Name'      => 'Bambang Adrian',
                'Usr_Email'     => 'bambang.adrian@yahoo.co.id',
                'Usr_Password'  => bcrypt('content2015'),
                'Usr_CreatedOn' => Carbon\Carbon::now(),
                'Usr_CreatedBy' => 1,
                'Usr_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Usr_Name'      => 'Faber Banjarnahor',
                'Usr_Email'     => 'faber.banjarnahor@gmail.com',
                'Usr_Password'  => bcrypt('supervisor2015'),
                'Usr_CreatedOn' => Carbon\Carbon::now(),
                'Usr_CreatedBy' => 3,
                'Usr_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        UserAccount::insert($userAccounts);
    }
}
