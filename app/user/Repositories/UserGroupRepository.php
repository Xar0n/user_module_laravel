<?php


namespace App\User\Repositories;

use App\User\Models\UserGroup;

/**
 * Class UserGroupRepository
 *
 * @package App\User\Repositories
 *
 * Репозиторий для работы с моделью UserGroup
 */
class UserGroupRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return UserGroup::class;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     *
     * @return UserGroup
     */
    public function getEdit(int $id):UserGroup
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Создать модель
     *
     * @param string $name
     *
     * @return UserGroup
     */
    public function store(string $name):UserGroup
    {
        $model = $this->startConditions();
        $model->name = $name;
        $model->save();
        return $model;
    }

    /**
     * Добавить роль к группе
     *
     * @param UserGroup $model
     * @param int $idRole
     */
    public function addRole(UserGroup $model, int $idRole)
    {
        $model->userRole()->attach($idRole);
    }

    /**
     * Удалить роль из группы
     *
     * @param UserGroup $model
     * @param int $idRole
     */
    public function deleteRole(UserGroup $model, int $idRole)
    {
        $model->userRole()->detach($idRole);
    }

    /**
     * Получить указанную роль группы
     *
     * @param UserGroup $model
     * @param int $idRole
     */
    public function getRole(UserGroup $model, int $idRole)
    {
        return $model->userRole()->find($idRole);
    }
}
