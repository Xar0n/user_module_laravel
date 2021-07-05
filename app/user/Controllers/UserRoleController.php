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
     * Вывести список ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Показать форму для создания нового ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Отобразить указанный ресурс.
     *
     * @param  \App\User\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Показать форму редактирования указанного ресурса.
     *
     * @param  \App\User\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {
        //
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

    /**
     * Удалить указанный ресурс из хранилища.
     *
     * @param  \App\User\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        //
    }
}
