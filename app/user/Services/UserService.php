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
        $gender = (bool) $request->input('user.gender');
        $login = $request->input('user.login');
        $password = md5(md5($request->input('user.password')));
        $fio = $request->input('user.fio');
        $email = !empty($request->input('user.email')) ? $request->input('user.email') : null;
        $phone = !empty($request->input('user.phone')) ? $request->input('user.phone') : null;
        $organization_id = !empty($request->input('user.organization_id')) ? (int) $request->input('user.organization_id') : null;
        $location_id = !empty($request->input('user.location_id')) ? (int) $request->input('user.location_id') : null;
        $this->userRepository->store($gender, $login, $password, $fio, $email, $phone, $organization_id, $location_id);
    }

    /**
     * Добавить роль пользователю
     *
     * @param Request $request
     */
    public function addRoles(Request $request)
    {

    }
}
