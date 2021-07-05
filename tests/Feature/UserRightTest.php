<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRightTest extends TestCase
{
    use WithFaker;

    public function test_update()
    {
        $response = $this->put('/users/rights/1', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('/users/rights', ['name' => $this->faker->unique()->sentence()]);
        $response->assertStatus(200);
    }
}
