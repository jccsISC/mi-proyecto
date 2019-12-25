<?php

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
        // se encarga de arrancar de manera ordenada cada seeder 
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
