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
        $this->call(TablePrefixSeeder::class);
        $this->command->info('Prefix Table Seeded !!');
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
        $this->call(CompanySeeder::class);
        $this->command->info('Company Table Seeded !!');
        $this->call(ImportFromSeeder::class);
        $this->command->info('ImportFrom Table Seeded !!');
        $this->call(MailListSeeder::class);
        $this->command->info('MailList Table Seeded !!');
        $this->call(SegmentSeeder::class);
        $this->command->info('Segment Table Seeded !!');
        $this->call(SegmentCriteriaSeeder::class);
        $this->command->info('SegmentCriteria Table Seeded !!');
        $this->call(SubscriberSeeder::class);
        $this->command->info('Subscriber Table Seeded !!');
        $this->call(DssRandomIndexSeeder::class);
        $this->command->info('Dss Random Index Table Seeded !!');
        $this->call(DssSeeder::class);
        $this->command->info('Dss Master Table Seeded !!');
        $this->call(DssCriteriaSeeder::class);
        $this->command->info('Dss Criteria Table Seeded !!');
        Model::reguard();
    }
}
