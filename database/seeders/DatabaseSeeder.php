<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);  //this will first position
        $this->call(RolePermissionSeeder::class); //this will Second position
        // \App\Models\User::factory(10)->create();
    }
}
