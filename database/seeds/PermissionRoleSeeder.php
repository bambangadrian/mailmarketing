<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\PermissionRole as PermissionRole;

class PermissionRoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        PermissionRole::truncate();
        # Seed the table.
        $permissionRoles = [
            [
                'Pmr_PermissionID' => 1,
                'Pmr_RoleID'       => 1,
                'Pmr_CreatedOn'    => Carbon\Carbon::now(),
                'Pmr_CreatedBy'    => 1,
                'Pmr_GUID'         => (string)Uuid::generate(4)
            ],
            [
                'Pmr_PermissionID' => 2,
                'Pmr_RoleID'       => 3,
                'Pmr_CreatedOn'    => Carbon\Carbon::now(),
                'Pmr_CreatedBy'    => 1,
                'Pmr_GUID'         => (string)Uuid::generate(4)
            ]
        ];
        PermissionRole::insert($permissionRoles);
    }
}
