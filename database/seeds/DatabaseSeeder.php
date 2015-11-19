<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        # Disable Foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UserAccountSeeder::class);
        $this->command->info('UserAccount Table Seeded !!');
        $this->call(UserRoleSeeder::class);
        $this->command->info('UserRole Table Seeded !!');
        $this->call(UserRoleDetailSeeder::class);
        $this->command->info('UserRoleDetail Table Seeded !!');
        $this->call(MailTrackingStatusSeeder::class);
        $this->command->info('MailTrackingStatus Table Seeded !!');
        $this->call(CampaignTypeSeeder::class);
        $this->command->info('CampaignType Table Seeded !!');
        $this->call(PermissionSeeder::class);
        $this->command->info('Permission Table Seeded !!');
        $this->call(PermissionRoleSeeder::class);
        $this->command->info('PermissionRole Table Seeded !!');
        Model::reguard();
    }
}
