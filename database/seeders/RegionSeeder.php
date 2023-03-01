<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     * php artisan db:seed --class=RegionSeeder
     *
     * @return void
     */
    public function run()
    {
        $regions = ['Phnom Penh', 'Siem Reap', 'Kandal'];

        foreach($regions as $name) {
            Region::create([
                'region_name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
