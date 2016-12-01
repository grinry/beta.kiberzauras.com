<?php

use Illuminate\Database\Seeder;

/**
 * Class InitSeeder
 * @author Rytis Grincevicius <rytis@inlu.net>
 */
class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables();

        $devices = [
            ['name'  =>  'iPhone'],
            ['name'  =>  'iPad'],
            ['name'  =>  'Android Phone'],
            ['name'  =>  'Android Tablet'],
            ['name'  =>  'Chromebook or Chromebox'],
            ['name'  =>  'Windows phone'],
            ['name'  =>  'Tizen'],
            ['name'  =>  'Wii U'],
            ['name'  =>  'PlayStation'],
            ['name'  =>  'Xbox'],
            ['name'  =>  'Windows computer'],
            ['name'  =>  'Linux computer'],
            ['name'  =>  'Mac OS computer'],
        ];

        $socials = [
            [ 'name'  =>  'Facebook' ],
            [ 'name'  =>  'Google+' ]
        ];

        $interests = [
            [ 'name'  =>  'Games' ],
            [ 'name'  =>  'Applications' ]
        ];

        DB::table('devices')->insert($devices);
        DB::table('social_platforms')->insert($socials);
        DB::table('interests')->insert($interests);
    }

    protected function truncateTables()
    {
        DB::table('users')->truncate();
        DB::table('password_resets')->truncate();
        DB::table('notifications')->truncate();
        DB::table('devices')->truncate();
        DB::table('social_platforms')->truncate();
        DB::table('interests')->truncate();
        DB::table('user_devices')->truncate();
        DB::table('user_social_platforms')->truncate();
        DB::table('user_interests')->truncate();
    }
}
