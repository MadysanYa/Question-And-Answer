<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyTypeSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     * php artisan db:seed --class=PropertyTypeSeeder
     *
     * @return void
     */
    public function run()
    {
        $PropertyType = [
            'Apartment', 'Building', 'Commercial Building', 'Condo', 'Factory', 
            'Flat House', 'Flat house 1 st floor up', 'Gas Station', 'Guesthouse', 
            'Hotel', 'Link House', 'Room Rental', 'Shop', 'Shop House', 'Twin Villa', 
            'Vacant Land', 'Villa', 'Warehouse', 'Wooden House'
        ];

        foreach($PropertyType as $name) {
            PropertyType::create([
                'property_type_name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
