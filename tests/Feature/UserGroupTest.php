<?php

namespace Tests\Feature;

use App\User\Models\UserGroup;
use App\User\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserGroupTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
        $response = $this->post('/users/groups', ['name' => $this->faker->bloodGroup().$this->faker->company()]);
        $response->assertStatus(200);
    }

    public function test_change_role()
    {
        $group = UserGroup::factory()->create();
        $role = UserRole::factory()->create();
        $response = $this->patch('/users/roles/'.$role->id.'/groups/'.$group->id, []);
        $response->assertStatus(200);
    }
}
