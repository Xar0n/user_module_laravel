<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence()
        ];
    }
}
