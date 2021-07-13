<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserOrganization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserBaseFactory
 *
 * Фабрика для создания организации
 */
class UserOrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserOrganization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company()
        ];
    }
}
