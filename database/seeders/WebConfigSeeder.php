<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\WebConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['bodyColor', 'themeColor', 'backgroundColor', 'fontColor', 'logo', 'faviconLogo'];

        foreach ($data as $key => $value) {
            $check = WebConfig::where('name',$value)->first();
            if (empty($check)) {
                $formData = new WebConfig();
                $formData->name = $value;
                $formData->save();
            }
        }
    }
}
