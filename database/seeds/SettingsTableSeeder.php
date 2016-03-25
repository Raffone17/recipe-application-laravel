<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting = New Setting;
        $setting->site_name = 'Recipe World';
        $setting->paginate_recipe = 6;
        $setting->paginate_admin = 20;
        $setting->theme = 1;
        
        $setting->save();
    }
}
