<?php


namespace App\User\Services;

use App\User\Models\User;
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
        $telegram = !empty($request->input('user.telegram')) ? $request->input('user.telegram') : null;
        $avatar = !empty($request->input('user.avatar')) ? $request->input('user.avatar') : null;
        $status = false;
        $fired = false;
        $organization_id = !empty($request->input('user.organization_id')) ? (int) $request->input('user.organization_id') : null;
        $division_id = !empty($request->input('user.division_id')) ? (int) $request->input('user.division_id') : null;
        $post_id = !empty($request->input('user.post_id')) ? (int) $request->input('user.post_id') : null;
        $base_id = !empty($request->input('user.base_id')) ? (int) $request->input('user.base_id') : null;
        $location_id = !empty($request->input('user.location_id')) ? (int) $request->input('user.location_id') : null;
        $model = $this->userRepository->store($gender, $login, $password, $fio, $email, $phone, $telegram, $avatar, $status,
            $fired, $organization_id, $division_id, $post_id, $base_id, $location_id);
        $roles = (array) $request->input('roles');
        foreach ($roles as $role) {
            $this->userRepository->addRole($model, $role);
        }
    }
}
