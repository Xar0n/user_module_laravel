<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use WithFaker;

    public function test_update()
    {
        $response = $this->put('/users/roles/1', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/users/roles', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }
}
