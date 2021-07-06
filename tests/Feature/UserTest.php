<?php

namespace Tests\Feature;

use App\User\Models\User;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use App\User\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    public function test_store()
    {
        $organization = UserOrganization::factory()->create();
        $location = UserLocation::factory()->create();
        $role = UserRole::factory()->create();
        $response = $this->post('/users', [
            'user' => [
                'gender' => mt_rand(0, 1),
                'login' => $this->faker->unique()->userName(),
                'password' => md5(md5('test')),
                'fio' => $this->faker->unique()->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => Str::random(16),
                'organization_id' => $organization->id,
                'location_id' => $location->id
            ],
            'roles' => [
                $role->id
            ]
        ]);
        $response->assertStatus(200);
    }

    public function test_store2()
    {
        $role1 = UserRole::factory()->create();
        $role2 = UserRole::factory()->create();
        $role3 = UserRole::factory()->create();
        $response = $this->post('/users', [
            'user' => [
                'gender' => mt_rand(0, 1),
                'login' => $this->faker->unique()->userName(),
                'password' => md5(md5('test')),
                'fio' => $this->faker->unique()->name(),
                'email' => null,
                'phone' => null,
                'organization_id' => null,
                'location_id' => null
            ],
            'roles' => [
                $role1->id,
                $role2->id,
                $role3->id
            ]
        ]);
        $response->assertStatus(200);
    }
}
