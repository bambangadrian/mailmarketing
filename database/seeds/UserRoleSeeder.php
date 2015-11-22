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
                'Ur_Slug'      => 'admin',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Content Editor',
                'Ur_Slug'      => 'content-editor',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Supervisor',
                'Ur_Slug'      => 'supervisor',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Designer',
                'Ur_Slug'      => 'designer',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Ur_Name'      => 'Manager',
                'Ur_Slug'      => 'manager',
                'Ur_CreatedOn' => Carbon\Carbon::now(),
                'Ur_CreatedBy' => 1,
                'Ur_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        UserRole::insert($userRoles);
    }
}
