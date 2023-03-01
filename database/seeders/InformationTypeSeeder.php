<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\InformationType;
use Illuminate\Database\Seeder;

class InformationTypeSeeder extends Seeder
{
    /**
     * 
     * Run the command seeds.
     * php artisan db:seed --class=InformationTypeSeeder
     *
     * @return void
     */
    public function run()
    {
        $InformationType = [
            'Asking', 'Certificate', 'Government', 'Indication', 
            'Property Owner', 'Real Estate Agent',' Social Media', 'Website'
        ];

        foreach($InformationType as $name) {
            InformationType::create([
                'information_type_name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
