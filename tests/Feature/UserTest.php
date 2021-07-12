<?php

namespace Tests\Feature;

use App\User\Models\User;
use App\User\Models\UserBase;
use App\User\Models\UserDivision;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use App\User\Models\UserPost;
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
        $division = UserDivision::factory()->create();
        $post = UserPost::factory()->create();
        $base = UserBase::factory()->create();
        $role = UserRole::factory()->create();
        $response = $this->post('/users', [
            'user' => [
                'gender' => mt_rand(0, 1),
                'login' => $this->faker->unique()->userName(),
                'password' => 'test',
                'fio' => $this->faker->unique()->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => Str::random(15),
                'telegram' => $this->faker->unique()->word(),
                'avatar' =>Str::random(50),
                'division_id' => $division->id,
                'post_id' => $post->id,
                'base_id' => $base->id,
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
                'password' => 'test',
                'fio' => $this->faker->unique()->name(),
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
