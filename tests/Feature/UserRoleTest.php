<?php

namespace Tests\Feature;

use App\User\Models\UserRight;
use App\User\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use WithFaker;

    public function test_update()
    {
        $role = UserRole::factory()->create();
        $response = $this->put('/users/roles/'.$role->id, ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/users/roles', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }

    public function test_change_right()
    {
        $right = UserRight::factory()->create();
        $role = UserRole::factory()->create();
        $response = $this->patch('/users/roles/'.$role->id.'/params/'.$right->id, []);
        $response->assertStatus(200);
    }
}
