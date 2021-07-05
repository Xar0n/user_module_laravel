<?php


namespace App\User\Services;

use App\User\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserService
 *
 * @package App\User\Services
 *
 */
class UserService
{
    private UserRepository $userRepository;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Создание модели
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $gender = (bool) $request->input('gender');
        $login = $request->input('login');
        $password = md5(md5($request->input('password')));
        $fio = $request->input('fio');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $organization_id = (int) $request->input('organization_id');
        $location_id = (int) $request->input('location_id');
        $this->userRepository->store($gender, $login, $password, $fio, $email, $phone, $organization_id, $location_id);
    }
}
