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
use App\User\Models\UserStorage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_store_all()
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
                'avatar' => Str::random(49),
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

    public function test_store_required()
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

    public function test_update_empty()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, []);
        $response->assertStatus(200);
    }

    public function test_update_status()
    {
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'user' => [
                'status' => mt_rand(0, 1),
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update_general()
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

    public function test_update_contact()
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

    public function test_update_roles()
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

    public function test_update_signers()
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

    public function test_update_storages()
    {
        $storage1 = UserStorage::factory()->create();
        $storage2 = UserStorage::factory()->create();
        $storage3 = UserStorage::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'storages' => [
                $storage1->id,
                $storage2->id,
                $storage3->id
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update_locations()
    {
        $location1 = UserLocation::factory()->create();
        $location2 = UserLocation::factory()->create();
        $location3 = UserLocation::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'locations' => [
                $location1->id,
                $location2->id,
                $location3->id
            ],
        ]);
        $response->assertStatus(200);
    }

    public function test_update_organizations()
    {
        $organization1 = UserOrganization::factory()->create();
        $organization2 = UserOrganization::factory()->create();
        $organization3 = UserOrganization::factory()->create();
        $user = User::factory()->create();
        $response = $this->patch('/users/'.$user->id, [
            'organizations' => [
                $organization1->id,
                $organization2->id,
                $organization3->id
            ],
        ]);
        $response->assertStatus(200);
    }
}
