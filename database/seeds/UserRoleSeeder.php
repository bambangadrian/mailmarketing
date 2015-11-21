<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\UserRole as UserRole;

class UserRoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        UserRole::truncate();
        # Seed the table.
        $userRoles = [
            [
                'Ur_Name'      => 'Administrator',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Content Editor',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Supervisor',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Designer',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Manager',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        UserRole::insert($userRoles);
    }
}
