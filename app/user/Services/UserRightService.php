<?php


namespace App\User\Services;


use App\User\Repositories\UserRightRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserRightService
 *
 * @package App\User\Services
 *
 * Сервис для работы с правами
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
     * @param Request $request
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function update(Request $request, int $id)
    {
        $right = $this->userRightRepository->getEdit($id);
        if (empty($right)) {
            abort(404);
        }
        $this->userRightRepository->update($right, $request->input('name'));
    }

    /**
     * Создание модели
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->userRightRepository->store($request->input('name'));
    }
}
