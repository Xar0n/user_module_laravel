<?php


namespace App\User\Services;

use App\User\Repositories\UserGroupRepository;
use Illuminate\Http\Request;

/**
 * Class UserGroupService
 *
 * @package App\User\Services
 *
 */
class UserGroupService
{
    private UserGroupRepository $userGroupRepository;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->userGroupRepository = app(UserGroupRepository::class);
    }

    /**
     * Создание модели
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->userGroupRepository->store($request->input('name'));
    }
}
