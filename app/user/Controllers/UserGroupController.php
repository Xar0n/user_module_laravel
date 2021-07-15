<?php

namespace App\User\Controllers;


use App\User\Requests\UserGroupRequest;
use App\User\Services\UserGroupService;
use Illuminate\Http\Request;

/**
 * Class UserGroupController
 *
 * @package App\User\Controllers
 *
 * Контроллер для работы с группами
 */
class UserGroupController extends Controller
{
    private UserGroupService $userGroupService;

    /**
     * UserGroupController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userGroupService = app(UserGroupService::class);
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     *
     * @param  UserGroupRequest  $request
     */
    public function store(UserGroupRequest $request)
    {
        $this->userGroupService->store($request);
    }

    /**
     * Добавить роль к группе.
     *
     * @param int $idRole
     * @param int $idGroup
     */
    public function changeRole($idRole, $idGroup)
    {
        $this->userGroupService->changeRole($idGroup, $idRole);
    }
}
