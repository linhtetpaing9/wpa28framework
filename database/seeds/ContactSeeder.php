<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [];

        $raw = json_decode(
            file_get_contents(resource_path('contacts.json')),
            true
        );


        foreach ($raw as $contact) {
        	
            $contacts[] = [
                'name' => $contact['firstname'].' '.$contact['lastname'],
                'email' => $contact['email'],
                'company' => $contact['company'],
                'state' => $contact['state'],
            ];
            
           
        }

        DB::table('contacts')->insert($contacts);
    }
}
