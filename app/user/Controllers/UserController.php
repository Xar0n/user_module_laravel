<?php

namespace App\User\Controllers;

use App\User\Requests\UserStoreRequest;
use App\User\Requests\UserUpdateRequest;
use App\User\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\User\Controllers
 *
 * Контроллер для работы с пользователем
 */
class UserController extends Controller
{
    private UserService $userService;

    /**
     * UserRightController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userService = app(UserService::class);
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     *
     * @param  UserStoreRequest  $request
     */
    public function store(UserStoreRequest $request)
    {
        $this->userService->store($request);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  UserUpdateRequest  $request
     * @@param  int $id
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->userService->update($request, $id);
    }
}
