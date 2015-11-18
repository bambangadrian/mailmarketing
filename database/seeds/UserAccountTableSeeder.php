<?php

use Illuminate\Database\Seeder;
use App\UserAccount as UserAccount;

class UserAccountTableSeeder extends Seeder
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
                'Usr_UserName'  => 'admin',
                'Usr_Email'     => 'bambang.adrian@gmail.com',
                'Usr_Password'  => bcrypt('optilog2014'),
                'Usr_CreatedOn' => Carbon\Carbon::now(),
                'Usr_CreatedBy' => 1,
                'Usr_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Usr_UserName'  => 'bambang.adrian',
                'Usr_Email'     => 'bambang.adrian@yahoo.co.id',
                'Usr_Password'  => bcrypt('content2015'),
                'Usr_CreatedOn' => Carbon\Carbon::now(),
                'Usr_CreatedBy' => 1,
                'Usr_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        UserAccount::insert($userAccounts);
    }
}
