<?php

namespace Database\Factories\User\Models;

use App\Models\Model;
use App\User\Models\UserStorage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStorageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStorage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word()
        ];
    }
}
