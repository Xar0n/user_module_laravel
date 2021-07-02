<?php


namespace App\User\Repositories;


use App\User\Models\UserRight;

/**
 * Class UserRightRepository
 *
 * @package App\User\Repositories
 *
 *
 */
class UserRightRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return UserRight::class;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     *
     * @return UserRight
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Создать модель
     *
     * @param string $name
     */
    public function store($name)
    {
        $model = $this->startConditions();
        $model->name = $name;
        $model->save();
    }
}
