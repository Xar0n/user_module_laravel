<?php


namespace App\User\Services;


use App\User\Repositories\UserRightRepository;

/**
 * Class UserRightService
 *
 * @package App\User\Services
 *
 */
class UserRightService
{

    private UserRightRepository $userRightRepository;

    /**
     * UserRightService constructor.
     */
    public function __construct()
    {
        $this->userRightRepository = app(UserRightRepository::class);
    }

    /**
     * Редактирование модели
     *
     * @param int $id
     * @param string $name
     */
    public function edit($id, $name)
    {
        $right = $this->userRightRepository->getEdit($id);
        if (empty($rigt)) {
            abort(404);
        }
        $right->name = $name;
        $right->save();
    }

    /**
     * Создание модели
     *
     * @param string $name
     */
    public function store($name)
    {
        $this->userRightRepository->store($name);
    }
}
