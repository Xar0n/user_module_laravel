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
 * Сервис для работы с пользователем
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
        $user = (array) $request->input('user');
        $gender = (bool) $user['gender'];
        $login = $user['login'];
        $password = md5(md5($user['password']));
        $fio = $user['fio'];
        $email = !empty($user['email']) ? $user['email'] : null;
        $phone = !empty($user['phone']) ? $user['phone'] : null;
        $telegram = !empty($user['telegram']) ? $user['telegram'] : null;
        $avatar = !empty($user['avatar']) ? $user['avatar'] : null;
        $status = false;
        $fired = false;
        $organization_id = !empty($user['organization_id']) ? (int) $user['organization_id'] : null;
        $division_id = !empty($user['division_id']) ? (int) $user['division_id'] : null;
        $post_id = !empty($user['post_id']) ? (int) $user['post_id'] : null;
        $base_id = !empty($user['base_id']) ? (int) $user['base_id'] : null;
        $location_id = !empty($user['location_id']) ? (int) $user['location_id'] : null;
        $model = $this->userRepository->store($gender, $login, $password, $fio, $email, $phone, $telegram, $avatar, $status,
            $fired, $organization_id, $division_id, $post_id, $base_id, $location_id);
        $roles = (array) $request->input('roles');
        foreach ($roles as $role) {
            $this->userRepository->addRole($model, $role);
        }
    }

    /**
     * Редактирование модели
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $model = $this->userRepository->getEdit($id);
        if(empty($model)) {
            abort(404);
        }
        $gender = (bool) $request->input('user.gender');
        $login = $request->input('user.login');
        $password = md5(md5($request->input('user.password')));
        $fio = $request->input('user.fio');
        $email = !empty($request->input('user.email')) ? $request->input('user.email') : null;
        $phone = !empty($request->input('user.phone')) ? $request->input('user.phone') : null;
        $telegram = !empty($request->input('user.telegram')) ? $request->input('user.telegram') : null;
        $avatar = !empty($request->input('user.avatar')) ? $request->input('user.avatar') : null;
        $status = !empty($request->input('user.status')) ? $request->input('user.status') : null;
        $fired = !empty($request->input('user.fired')) ? $request->input('user.fired') : null;
        $organization_id = !empty($request->input('user.organization_id')) ? (int) $request->input('user.organization_id') : null;
        $division_id = !empty($request->input('user.division_id')) ? (int) $request->input('user.division_id') : null;
        $post_id = !empty($request->input('user.post_id')) ? (int) $request->input('user.post_id') : null;
        $base_id = !empty($request->input('user.base_id')) ? (int) $request->input('user.base_id') : null;
        $location_id = !empty($request->input('user.location_id')) ? (int) $request->input('user.location_id') : null;
        $model = $this->userRepository->update($model, $gender, $login, $password, $fio, $email, $phone, $telegram, $avatar, $status,
            $fired, $organization_id, $division_id, $post_id, $base_id, $location_id);
        if($request->has('roles')) {
            $this->userRepository->deleteAllRoles($model);
            $roles = (array) $request->input('roles');
            foreach ($roles as $role) {
                $this->userRepository->addRole($model, $role);
            }
        } if($request->has('signers')) {
            $this->userRepository->deleteAllSigners($model);
            $signers = (array) $request->input('signers');
            foreach ($signers as $signer) {
                $this->userRepository->addSigner($model, $signer);
            }
        } if($request->has('hierarchies')) {
            $this->userRepository->deleteAllHierarchies($model);
            $hierarchies = (array) $request->input('hierarchies');
            foreach ($hierarchies as $hierarchy) {
                $this->userRepository->addHierarchy($model, $hierarchy);
            }
        }
    }
}
