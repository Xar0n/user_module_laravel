<?php

namespace App\User\Controllers;


use App\User\Services\UserGroupService;
use Illuminate\Http\Request;

/**
 * Class UserGroupController
 *
 * @package App\User\Controllers
 *
 *
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
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->userGroupService->store($request);
    }
}
