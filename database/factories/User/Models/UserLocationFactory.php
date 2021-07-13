<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserBaseFactory
 *
 * Фабрика для создания участка
 */
class UserLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->city()
        ];
    }
}
