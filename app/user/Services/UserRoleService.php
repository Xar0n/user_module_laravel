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
 */
class UserRoleService
{
    private UserRoleRepository $userRoleRepository;

    /**
     * UserRightService constructor.
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
}
