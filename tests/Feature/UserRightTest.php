<?php

namespace Tests\Feature;


use App\User\Models\UserRight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRightTest extends TestCase
{
    use WithFaker;

    public function test_update()
    {
        $right = UserRight::factory()->create();
        $response = $this->put('/users/rights/'.$right->id, ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/users/rights', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }
}
