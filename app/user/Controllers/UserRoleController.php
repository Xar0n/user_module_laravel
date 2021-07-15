<?php

namespace App\User\Controllers;

use App\User\Requests\UserRoleRequest;
use App\User\Services\UserRoleService;

/**
 * Class UserRoleController
 *
 * @package App\User\Controllers
 *
 * Контроллер для работы с ролями
 */
class UserRoleController extends Controller
{
    private UserRoleService $userRoleService;

    /**
     * UserRightController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userRoleService = app(UserRoleService::class);
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     *
     * @param  UserRoleRequest  $request
     */
    public function store(UserRoleRequest $request)
    {
        $this->userRoleService->store($request);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  UserRoleRequest  $request
     * @param  int $id
     */
    public function update(UserRoleRequest $request, $id)
    {
        $this->userRoleService->update($request, $id);
    }

    /**
     * Добавить право к роли.
     *
     * @param int $idRole
     * @param int $idRight
     */
    public function changeRight($idRole, $idRight)
    {
        $this->userRoleService->changeRight($idRole, $idRight);
    }
}
