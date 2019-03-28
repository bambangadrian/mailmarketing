<?php
use Illuminate\Database\Seeder;
use MailMarketing\Models\Subscriber as Subscriber;

class SubscriberSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Clear the table.
        Subscriber::truncate();
        # Seed the table.
        $subscribers = [
            [
                'Sbr_ImportFromID' => 4,
                'Sbr_EmailAddress' => 'maitaelfrida29@gmail.com',
                'Sbr_FirstName'    => 'Maita',
                'Sbr_LastName'     => 'Elfrida',
                'Sbr_Gender'       => 'F',
                'Sbr_BirthDay'     => '1987-04-24',
                'Sbr_Address1'     => 'Perumahan Bagasasi Blok F3 No.1',
                'Sbr_Address2'     => 'Cibarusah',
                'Sbr_Address3'     => 'Cikarang Selatan',
                'Sbr_Active'       => 1,
                'Sbr_CreatedOn'    => Carbon\Carbon::now(),
                'Sbr_CreatedBy'    => 1,
                'Sbr_GUID'         => (string)Uuid::generate(4)
            ]
        ];
        Subscriber::insert($subscribers);
    }
}
