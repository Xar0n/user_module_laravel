<?php


namespace App\User\Repositories;


use App\User\Models\UserRight;

/**
 * Class UserRightRepository
 *
 * @package App\User\Repositories
 *
 * Репозиторий для работы с моделью UserRight
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
    public function getEdit(int $id):UserRight
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Создать модель
     *
     * @param string $name
     *
     * @return UserRight
     */
    public function store(string $name):UserRight
    {
        $model = $this->startConditions();
        $model->name = $name;
        $model->save();
        return $model;
    }

    /**
     * Редактировать модель
     *
     * @param UserRight $model
     * @param string $name
     *
     * @return UserRight
     */
    public function update(UserRight $model, string $name):UserRight
    {
        $model->name = $name;
        $model->save();
        return $model;
    }
}
