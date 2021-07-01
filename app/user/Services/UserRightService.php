<?php


namespace App\User\Services;


use App\User\Repositories\UserRightRepository;

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
     * @param $id
     * @param $name
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
}
