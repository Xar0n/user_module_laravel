<?php


namespace App\User\Repositories;


use App\User\Models\UserRole;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UserRoleRepository
 *
 * @package App\User\Repositories
 *
 *
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
     * Получить модель для редактирования
     *
     * @param int $id
     *
     * @return UserRole
     *
     * @throws ModelNotFoundException
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить права роли
     *
     * @param int $id
     *
     * @return
     *
     * @throws ModelNotFoundException
     */
    public function getRights($id)
    {

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

    /**
     * Редактировать модель
     *
     * @param UserRole $model
     * @param string $name
     */
    public function update(UserRole $model, string $name)
    {
        $model->name = $name;
        $model->save();
    }
}
