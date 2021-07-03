<?php

namespace Database\Factories\User\Models;

use App\User\Models\User;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender' => mt_rand(0, 1),
            'login' => $this->faker->unique()->userName(),
            'password' => md5(md5('test')),
            'fio' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => Str::random(16),
            'organization_id' => UserOrganization::factory(),
            'location_id' => UserLocation::factory()
        ];
    }
}
