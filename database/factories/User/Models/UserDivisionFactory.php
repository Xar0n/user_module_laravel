<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserDivision;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserBaseFactory
 *
 * Фабрика для создания пользователя
 */
class UserDivisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDivision::class;

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
