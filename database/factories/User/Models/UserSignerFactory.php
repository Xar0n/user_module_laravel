<?php

namespace Database\Factories\User\Models;

use App\User\Models\UserBase;
use App\User\Models\UserDivision;
use App\User\Models\UserLocation;
use App\User\Models\UserOrganization;
use App\User\Models\UserPost;
use App\User\Models\UserSigner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserSignerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSigner::class;

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
            'phone' => Str::random(15),
            'telegram' => Str::random(32),
            'avatar' => Str::random(50),
            'status' => mt_rand(0, 1),
            'fired' => mt_rand(0, 1),
            'organization_id' => UserOrganization::factory(),
            'division_id' => UserDivision::factory(),
            'post_id' => UserPost::factory(),
            'location_id' => UserLocation::factory(),
            'base_id' => UserBase::factory()
        ];
    }
}
