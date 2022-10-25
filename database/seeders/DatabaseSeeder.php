<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Bike;
use App\Models\Command;
use App\Models\Balade;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    Bike::factory(10)->create();
    Command::factory(10)->create();
    User::factory(10)->create();
    Balade::factory(10)->create();

        // \App\Models\User::factory(10)->create();
    }
}
