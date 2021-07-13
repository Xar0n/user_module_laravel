<?php


namespace App\User\Services;


use App\User\Repositories\UserRoleRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserRoleService
 *
 * @package App\User\Services
 *
 * Сервис для работы с ролями
 */
class UserRoleService
{
    private UserRoleRepository $userRoleRepository;

    /**
     * UserRoleService constructor.
     */
    public function __construct()
    {
        $this->userRoleRepository = app(UserRoleRepository::class);
    }

    /**
     * Редактирование модели
     *
     * @param int $id
     * @param Request $request
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function update(Request $request, int $id)
    {
        $role = $this->userRoleRepository->getEdit($id);
        if (empty($role)) {
            abort(404);
        }
        $this->userRoleRepository->update($role, $request->input('name'));
    }

    /**
     * Создание модели
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->userRoleRepository->store($request->input('name'));
    }

    /**
     * Добавить право к роли.
     *
     * @param int $idRole
     * @param int $idRight
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function addRight(int $idRole, int $idRight)
    {
        $role = $this->userRoleRepository->getEdit($idRole);
        if (empty($role)) {
            abort(404);
        }
        $this->userRoleRepository->addRight($role, $idRight);
    }

    /**
     * Изменение права роли(Добавление или удаление)
     *
     * @param int $idRole
     * @param int $idRight
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function changeRight(int $idRole, int $idRight)
    {
        $role = $this->userRoleRepository->getEdit($idRole);
        if (empty($role)) {
            abort(404);
        }
        $right = $this->userRoleRepository->getRight($role, $idRight);
        if (empty($right)) {
            $this->userRoleRepository->addRight($role, $idRight);
        } else {
            $this->userRoleRepository->deleteRight($role, $idRight);
        }
    }
}
