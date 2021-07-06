<?php


namespace App\User\Repositories;

use App\User\Models\User;
use App\User\Models\UserGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UserGroupRepository
 *
 * @package App\User\Repositories
 *
 *
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
     *
     * @throws ModelNotFoundException
     */
    public function getEdit(int $id):UserGroup
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Создать модель
     *
     * @param string $name
     */
    public function store(string $name)
    {
        $model = $this->startConditions();
        $model->name = $name;
        $model->save();
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
}
