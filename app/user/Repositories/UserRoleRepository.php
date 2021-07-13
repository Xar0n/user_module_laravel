<?php


namespace App\User\Repositories;


use App\User\Models\UserRole;

/**
 * Class UserRoleRepository
 *
 * @package App\User\Repositories
 *
 * Репозиторий для работы с моделью UserRole
 */
class UserRoleRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return UserRole::class;
    }

    /**
     * Получить модель для редактирования.
     *
     * @param int $id
     *
     * @return UserRole
     */
    public function getEdit(int $id):UserRole
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить права роли.
     *
     * @param int $id
     *
     * @return
     */
    public function getRights(int $id)
    {

    }

    /**
     * Добавить право к роли
     *
     * @param UserRole $model
     * @param int $idRight
     */
    public function addRight(UserRole $model, int $idRight)
    {
        $model->userRight()->attach($idRight);
    }

    /**
     * Удалить право из роли
     *
     * @param UserRole $model
     * @param int $idRight
     */
    public function deleteRight(UserRole $model, int $idRight)
    {
        $model->userRight()->detach($idRight);
    }

    /**
     * Получить указанное право роли
     *
     * @param UserRole $model
     * @param int $idRight
     */
    public function getRight(UserRole $model, int $idRight)
    {
        return $model->userRight()->find($idRight);
    }

    /**
     * Создать модель
     *
     * @param string $name
     * @return UserRole
     */
    public function store(string $name):UserRole
    {
        $model = $this->startConditions();
        $model->name = $name;
        $model->save();
        return $model;
    }

    /**
     * Редактировать модель.
     *
     * @param UserRole $model
     * @param string $name
     * @return UserRole
     */
    public function update(UserRole $model, string $name):UserRole
    {
        $model->name = $name;
        $model->save();
        return $model;
    }
}
