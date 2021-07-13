<?php

namespace App\User\Controllers;

use App\User\Services\UserRightService;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->userRightService->store($request);
    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @@param  int $id
     */
    public function update(Request $request, $id)
    {
        $this->userRightService->update($request, $id);
    }
}
