<?php

namespace Database\Seeders;

use App\Models\Borey;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BoreySeeder extends Seeder
{
    /**
     * 
     * Run the command seeds.
     * php artisan db:seed --class=BoreySeeder
     *
     * @return void
     */
    public function run()
    {
        $boreyNames = ['Chamkar Doung I'];

        foreach($boreyNames as $name) {
            Borey::create([
                'borey_name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
