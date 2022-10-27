<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PRS;
use App\Models\User;
use App\Models\Client;
use App\Models\Clients;
use App\Models\Enquiries;
use App\Models\Properties;
use App\Models\Applications;
use App\Models\EmailSetting;
use Illuminate\Database\Seeder;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        PRS::factory(3)->create();
        
        Clients::factory(2)->create();

        Properties::factory(5)->create();
        
        EmailSetting::create([
            'prs_code' => 'PRS1',
            'email_code' => 'EMAIL0001',
            'service_provider' => 'G Demo Provider',
            'service_name' => 'Gmail',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'host' => 'smtp.gmail.com',
            'port' => '587',
            'encryption' => 'tls',
            'from_name' => 'Admin',
            'from_email' => 'test@gmail.com',
            'reply_to_name' => 'Admin',
            'reply_to_email' => 'reply@mail.com',
            'user_id' => '1',
        ]);

        Enquiries::factory(10000)->create();

        // Enquiries::create([
        //     'email_code' => 'EMAIL0001',
        //     'enquiry_id' => 'ENQ0001',
        //     'prs_code' => 'PRS0001',
        //     'property_code' => 'PRP0001',
        //     'email' => 'mail@example.com',
        //     'title' => 'Enquiry Title',
        //     'date' => '2021-10-10',
        //     'body' => 'Enquiry Body',
        //     'contact_phone' => '123456789',
        //     'contact_name' => 'Contact Name',
        //     'contact_email' => 'contact@mail.com',
        //     'status' => 'New',
        // ]);

        Applications::factory(10000)->create();

    }
}
