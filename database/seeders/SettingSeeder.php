<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create( ['key' => 'Test', 'value' => 'I am test setting'] );
        Setting::create( ['key' => 'company_address', 'value' => '205 North Michigan Avenue, Suite 810'] );
        Setting::create( ['key' => 'email', 'value' => 'admin@gmail.com'] );
        Setting::create( ['key' => 'phone_code', 'value' => '+1'] );
        Setting::create( ['key' => 'phone', 'value' => '12124567890'] );
    }
}