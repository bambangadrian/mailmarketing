<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\Permission as Permission;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        Permission::truncate();
        # Seed the table.
        $permissions = [
            [
                'Pm_Name'        => 'Show All',
                'Pm_Slug'        => 'show-all',
                'Pm_Description' => 'Show all menu',
                'Pm_CreatedOn'   => Carbon\Carbon::now(),
                'Pm_CreatedBy'   => 1,
                'Pm_GUID'        => (string)Uuid::generate(4)
            ],
            [
                'Pm_Name'        => 'Show Campaign',
                'Pm_Slug'        => 'show-campaign',
                'Pm_Description' => 'Only show campaign menu',
                'Pm_CreatedOn'   => Carbon\Carbon::now(),
                'Pm_CreatedBy'   => 1,
                'Pm_GUID'        => (string)Uuid::generate(4)
            ]
        ];
        Permission::insert($permissions);
    }
}
