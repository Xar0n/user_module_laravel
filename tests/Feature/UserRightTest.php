<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRightTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_edit()
    {
        $response = $this->put('/users/rights/1', ['name' => 'Добавление компании']);
        $response->assertStatus(200);
    }
}
