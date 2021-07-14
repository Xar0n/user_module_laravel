<?php

namespace Tests\Feature;

use App\User\Models\User;
use App\User\Models\UserBase;
use App\User\Models\UserDivision;
use App\User\Models\UserHierarchy;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use App\User\Models\UserPost;
use App\User\Models\UserRole;
use App\User\Models\UserSigner;
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

    public function test_update1()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, []);
        $response->assertStatus(200);
    }

    public function test_update2()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'user' => [
                'status' => mt_rand(0, 1),
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update3()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'user' => [
                'gender' => mt_rand(0, 1),
                'login' => $this->faker->unique()->userName(),
                'fio' => $this->faker->unique()->name(),
                'fired' => 0,
                'division_id' => $user->division->id,
                'post_id' => $user->post->id,
                'base_id' => $user->base->id,
                'organization_id' => $user->organization->id,
                'location_id' => $user->location->id
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update4()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'user' => [
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => Str::random(15),
                'telegram' => $this->faker->unique()->word(),
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update5()
    {
        $role1 = UserRole::factory()->create();
        $role2 = UserRole::factory()->create();
        $role3 = UserRole::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'roles' => [
                $role1->id,
                $role2->id,
                $role3->id
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update6()
    {
        $signer1 = UserSigner::factory()->create();
        $signer2 = UserSigner::factory()->create();
        $signer3 = UserSigner::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'signers' => [
                $signer1->id,
                $signer2->id,
                $signer3->id
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update7()
    {
        $hierarchy1 = UserHierarchy::factory()->create();
        $hierarchy2 = UserHierarchy::factory()->create();
        $hierarchy3 = UserHierarchy::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'hierarchies' => [
                $hierarchy1->id,
                $hierarchy2->id,
                $hierarchy3->id
            ],
        ]);
        $response->assertStatus(200);
    }
}
