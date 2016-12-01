<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @author Rytis Grincevicius <rytis@inlu.net>
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitSeeder::class);
    }
}
