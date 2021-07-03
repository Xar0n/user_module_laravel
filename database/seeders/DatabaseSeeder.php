<?php

namespace Database\Seeders;
use App\User\Models\User;
use App\User\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->has(UserRole::factory()->count(3))->create();
        // \App\Models\User::factory(10)->create();
    }
}
