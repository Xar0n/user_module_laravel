<?php

namespace Database\Seeders;
use App\User\Models\User;
use App\User\Models\UserGroup;
use App\User\Models\UserHierarchy;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use App\User\Models\UserRole;
use App\User\Models\UserSigner;
use App\User\Models\UserStorage;
use Illuminate\Database\Seeder;;
use App\User\Models\UserRight;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->has(UserRole::factory()->has(UserRight::factory()->count(2))
            ->count(3))->has(UserStorage::factory())->has(UserOrganization::factory())
            ->has(UserLocation::factory())->has(UserHierarchy::factory())->has(UserSigner::factory())
            ->has(UserOrganization::factory())->create();
        UserGroup::factory()->has(UserRole::factory()->count(2))->create();
    }
}
