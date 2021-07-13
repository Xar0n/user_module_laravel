<?php

namespace App\User\Controllers;

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
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->userService->store($request);
    }
}
