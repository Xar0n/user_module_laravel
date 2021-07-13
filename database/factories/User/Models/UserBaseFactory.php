<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserBase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserBaseFactory
 *
 * Фабрика для создания пользователя
 */
class UserBaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserBase::class;

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
