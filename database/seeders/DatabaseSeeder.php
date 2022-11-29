<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PRS;
use App\Models\User;
use App\Models\Units;
use App\Models\Client;
use App\Models\Clients;
use App\Models\Profiles;
use App\Models\Enquiries;
use App\Models\Properties;
use App\Models\Applications;
use App\Models\EmailSetting;
use Illuminate\Database\Seeder;
use Illuminate\Console\Application;
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
        PRS::factory(3)->create();

        User::factory(10)->create();

        Clients::factory(2)->create();

        Properties::factory(3)->create();

        Units::factory(50)->create();

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


        Applications::factory(50)->create();

        Profiles::factory(20)->create();

        Enquiries::factory(1000)->create();
    }
}
