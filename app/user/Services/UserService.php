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
        $gender = false;
        $login = null;
        $fio = null;
        $post_id = null;
        $division_id = null;
        $organization_id = null;
        $fired = false;;
        $location_id = null;
        $base_id = null;
        $email = null;
        $phone = null;
        $telegram = null;
        $status = false;
        //Здесь хранится информация о секции редактирование которой нужно выполнить
        $flagEditSection = 'nothing';
        $model = $this->userRepository->getEdit($id);
        if(empty($model)) {
            abort(404);
        }
        //Основные поля пользователя
        $keysUserGeneralInf = ['user.gender', 'user.login', 'user.fio', 'user.post_id', 'user.division_id',
            'user.organization_id', 'user.fired', 'user.location_id', 'user.base_id'];
        //Поля с контактной информацией пользователя
        $keysUserContactInf = ['user.email', 'user.phone', 'user.telegram'];
        $user = (array) $request->input('user');
        if($request->has($keysUserGeneralInf)) {
            $gender = (bool) $user['gender'];
            $login = $user['login'];
            $fio = $user['fio'];
            $post_id = !empty($user['post_id']) ? (int) $user['post_id'] : null;
            $division_id = !empty($user['division_id']) ? (int) $user['division_id'] : null;
            $organization_id = !empty($user['organization_id']) ? (int) $user['organization_id'] : null;
            $fired = !empty($user['fired']) ? (bool) $user['fired'] : false;;
            $location_id = !empty($user['location_id']) ? (int) $user['location_id'] : null;
            $base_id = !empty($user['base_id']) ? (int) $user['base_id'] : null;
            $flagEditSection = 'general';
        } else if($request->has($keysUserContactInf)) {
            $email = !empty($user['email']) ? $user['email'] : null;
            $phone = !empty($user['phone']) ? $user['phone'] : null;
            $telegram = !empty($user['telegram']) ? $user['telegram'] : null;
            $flagEditSection = 'contact';
        } else if ($request->has('user.status')) {
            $status = $user['status'];
            $flagEditSection = 'status';
        } else if($request->has('roles')) {
            $this->userRepository->deleteAllRoles($model);
            $roles = (array) $request->input('roles');
            foreach ($roles as $role) {
                $this->userRepository->addRole($model, $role);
            }
        } else if($request->has('signers')) {
            $this->userRepository->deleteAllSigners($model);
            $signers = (array) $request->input('signers');
            foreach ($signers as $signer) {
                $this->userRepository->addSigner($model, $signer);
            }
        } else if($request->has('hierarchies')) {
            $this->userRepository->deleteAllHierarchies($model);
            $hierarchies = (array) $request->input('hierarchies');
            foreach ($hierarchies as $hierarchy) {
                $this->userRepository->addHierarchy($model, $hierarchy);
            }
        }
        $this->userRepository->update($model, $flagEditSection, $gender, $login, $fio, $email, $phone, $telegram, $status,
            $fired, $organization_id, $division_id, $post_id, $base_id, $location_id);
    }
}
