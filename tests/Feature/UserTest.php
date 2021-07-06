<?php

namespace Tests\Feature;

use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
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
        $response = $this->post('/users', [
            'gender' => mt_rand(0, 1),
            'login' => $this->faker->unique()->userName(),
            'password' => md5(md5('test')),
            'fio' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => Str::random(16),
            'organization_id' => $organization->id,
            'location_id' => $location->id
        ]);
        $response->assertStatus(200);
    }

    public function test_store2()
    {
        $response = $this->post('/users', [
            'gender' => mt_rand(0, 1),
            'login' => $this->faker->unique()->userName(),
            'password' => md5(md5('test')),
            'fio' => $this->faker->unique()->name(),
            'email' => '',
            'phone' => '',
            'organization_id' => '',
            'location_id' => '',
        ]);
        $response->assertStatus(200);
    }
}
