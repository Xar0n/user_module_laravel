<?php

namespace App\User\Controllers;

use App\User\Models\UserRole;
use App\User\Services\UserRoleService;
use Illuminate\Http\Request;

/**
 * Class UserRoleController
 *
 * @package App\User\Controllers
 *
 *
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userRoleService->store($request);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->userRoleService->update($request, $id);
    }
}
