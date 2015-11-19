<?php

use Illuminate\Database\Seeder;
use MailMarketing\Models\UserRoleDetail as UserRoleDetail;

class UserRoleDetailSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        UserRoleDetail::truncate();
        # Seed the table.
        $userRoleDetails = [
            [
                'Urd_UserID'    => 1,
                'Urd_RoleID'    => 1,
                'Urd_CreatedOn' => Carbon\Carbon::now(),
                'Urd_CreatedBy' => 1,
                'Urd_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Urd_UserID'    => 2,
                'Urd_RoleID'    => 2,
                'Urd_CreatedOn' => Carbon\Carbon::now(),
                'Urd_CreatedBy' => 1,
                'Urd_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        UserRoleDetail::insert($userRoleDetails);
    }
}
