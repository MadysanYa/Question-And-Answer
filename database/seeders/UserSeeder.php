<?php

namespace Database\Seeders;

use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class="UserSeeder"
     *
     * @return void
     */
    public function run()
    {
        UserAdmin::create([
            "username" => "admin",
            "name" => "Administrator",
            "password" => Hash::make("shinhan@1")
        ]);
    }
}
