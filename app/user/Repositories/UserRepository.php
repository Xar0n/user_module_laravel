<?php


namespace App\User\Repositories;

use App\User\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UserRepository
 *
 * @package App\User\Repositories
 *
 * Репозиторий для работы с моделью User
 */
class UserRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return User::class;
    }

    /**
     * Получить модель для редактирования
     *
     * @param int $id
     *
     * @return User
     */
    public function getEdit(int $id):User
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Создать модель
     *
     * @param boolean $gender
     * @param string $login
     * @param string $password
     * @param string $fio
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $telegram
     * @param string|null $avatar
     * @param boolean $status
     * @param boolean $fired
     * @param int|null $organization_id
     * @param int|null $division_id
     * @param int|null $post_id
     * @param int|null $base_id
     * @param int|null $location_id
     *
     * @return User
     */
    public function store(bool $gender, string $login, string $password,
                          string $fio, string $email = null, string $phone = null,
                          string $telegram = null, string $avatar = null, bool $status, bool $fired,
                          int $organization_id = null, int $division_id = null,
                          int $post_id = null, int $base_id = null, int $location_id = null):User
    {
        $model = $this->startConditions();
        $model->gender = $gender;
        $model->login = $login;
        $model->password = $password;
        $model->fio = $fio;
        $model->email = $email;
        $model->phone = $phone;
        $model->telegram = $telegram;
        $model->avatar = $avatar;
        $model->status = $status;
        $model->fired = $fired;
        $model->organization_id = $organization_id;
        $model->division_id = $division_id;
        $model->post_id = $post_id;
        $model->base_id = $base_id;
        $model->location_id = $location_id;
        $model->save();
        return $model;
    }

    /**
     * Добавить роль к пользователю
     *
     * @param User $model
     * @param int $idRole
     */
    public function addRole(User $model, int $idRole)
    {
        $model->userRole()->attach($idRole);
    }
}
