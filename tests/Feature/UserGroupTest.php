<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserGroupTest extends TestCase
{
    use WithFaker;
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
}
