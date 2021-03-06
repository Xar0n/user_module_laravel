<?php

namespace App\User\Controllers;

use App\User\Requests\UserRightRequest;
use App\User\Services\UserRightService;

/**
 * Class UserRightController
 *
 * @package App\User\Controllers
 *
 * Контроллер для работы с правами
 */
class UserRightController extends Controller
{
    private UserRightService $userRightService;

    /**
     * UserRightController constructor.
     */
    public function __construct()
    {
       parent::__construct();
       $this->userRightService = app(UserRightService::class);
    }

    /**
     * Сохранить вновь созданный ресурс в хранилище.
     *
     * @param  UserRightRequest  $request
     */
    public function store(UserRightRequest $request)
    {
        $this->userRightService->store($request);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  UserRightRequest  $request
     * @@param  int $id
     */
    public function update(UserRightRequest $request, $id)
    {
        $this->userRightService->update($request, $id);
    }
}
