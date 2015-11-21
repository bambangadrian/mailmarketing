<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\CampaignType as CampaignType;

class CampaignTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        CampaignType::truncate();
        # Seed the table.
        $campaignTypes = [
            [
                'Cgt_Name'      => 'Plain Text',
                'Cgt_CreatedOn' => Carbon\Carbon::now(),
                'Cgt_CreatedBy' => 1,
                'Cgt_GUID'      => (string)Uuid::generate(4)
            ],
            [
                'Cgt_Name'      => 'HTML',
                'Cgt_CreatedOn' => Carbon\Carbon::now(),
                'Cgt_CreatedBy' => 1,
                'Cgt_GUID'      => (string)Uuid::generate(4)
            ]
        ];
        CampaignType::insert($campaignTypes);
    }
}
