<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $roles = [
            ['name' => 'Admin', 'id' => 1, 'created_at' => $now, 'updated_at' => $now],
            // Add more roles as needed
        ];
        DB::table('roles')->insert($roles);
    }
}
