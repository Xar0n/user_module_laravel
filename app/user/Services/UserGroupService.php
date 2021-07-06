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
}
