<?php


namespace App\User\Services;

use App\User\Repositories\UserGroupRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserGroupService
 *
 * @package App\User\Services
 *
 * Сервис для работы с группами
 */
class UserGroupService
{
    private UserGroupRepository $userGroupRepository;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->userGroupRepository = app(UserGroupRepository::class);
    }

    /**
     * Создание модели
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->userGroupRepository->store($request->input('name'));
    }

    /**
     * Добавить роль к группе.
     *
     * @param int $idGroup
     * @param int $idRole
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function addRole(int $idGroup, int $idRole)
    {
        $group = $this->userGroupRepository->getEdit($idGroup);
        if (empty($group)) {
            abort(404);
        }
        $this->userGroupRepository->addRole($group, $idRole);
    }

    /**
     * Изменение роли группы(Добавление или удаление)
     *
     * @param int $idGroup
     * @param int $idRole
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function changeRole(int $idGroup, int $idRole)
    {
        $group = $this->userGroupRepository->getEdit($idGroup);
        if (empty($group)) {
            abort(404);
        }
        $role = $this->userGroupRepository->getRole($group, $idRole);
        if (empty($role)) {
            $this->userGroupRepository->addRole($group, $idRole);
        } else {
            $this->userGroupRepository->deleteRole($group, $idRole);
        }
    }
}
