<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'gender' => mt_rand(0, 1),
            'login' => str_random(5),
            'password' => md5(md5('test')),
            'fio' => str_random(30),
            'email' => str_random(10).'@gmail.com',
            'phone' => str_random(16),
            'organization_id' => null,
            'location_id' => null
        ]);
    }
}
