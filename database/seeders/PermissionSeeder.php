<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class="PermissionSeeder"
     *
     * @return void
     */
    public function run()
    {
        DB::table("admin_permissions")->insert([
            "name" => "admin",
            "slug" => "*",
            "http_path" => "*",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table("admin_role_permissions")->insert([
            "role_id" => 1,
            "permission_id" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        
        DB::table("admin_role_users")->insert([
            "role_id" => 1,
            "user_id" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table("admin_roles")->insert([
            "name" => "Administrator",
            "slug" => "administrator",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        DB::table("admin_user_permissions")->insert([
            "user_id" => 1,
            "permission_id" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
