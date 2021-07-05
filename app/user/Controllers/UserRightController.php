<?php

namespace App\User\Controllers;

use App\User\Models\UserRight;
use App\User\Services\UserRightService;
use Illuminate\Http\Request;

/**
 * Class UserRightController
 *
 * @package App\User\Controllers
 *
 *
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
     * Вывести список ресурса.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $this->userRightService->store($request);
    }

    /**
     * Отобразить указанный ресурс.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Обновить указанный ресурс в хранилище.
     *
     * @param  \Illuminate\Http\Request  $request
     * @@param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->userRightService->edit($id, $request);
    }

    /**
     * Удалите указанный ресурс из хранилища.
     *
     * @param  \App\User\Models\UserRight  $userRight
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
