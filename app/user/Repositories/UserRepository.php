<?php


namespace App\User\Repositories;

use App\User\Models\User;

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
     * Редактировать модель
     *
     * @param User $user
     * @param string $flagEditSection
     * @param boolean $gender
     * @param string|null $login
     * @param string|null $fio
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $telegram
//     * @param string|null $avatar
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
    public function update(User $user, string $flagEditSection, bool $gender, string $login = null,
                          string $fio = null, string $email = null, string $phone = null,
                          string $telegram = null, bool $status, bool $fired,
                          int $organization_id = null, int $division_id = null,
                          int $post_id = null, int $base_id = null, int $location_id = null):User
    {
        $model = $user;
        switch ($flagEditSection) {
            case 'general':
                $model->gender = $gender;
                $model->login = $login;
                $model->fio = $fio;
                $model->fired = $fired;
                $model->organization_id = $organization_id;
                $model->division_id = $division_id;
                $model->post_id = $post_id;
                $model->base_id = $base_id;
                $model->location_id = $location_id;
                break;
            case 'contact':
                $model->email = $email;
                $model->phone = $phone;
                $model->telegram = $telegram;
                break;
            case 'status':
                $model->status = $status;
                break;
            case 'nothing':
                break;
        }
        //        $model->avatar = $avatar;
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

    /**
     * Добавить утавердителя к пользователю
     *
     * @param User $model
     * @param int $idSigner
     */
    public function addSigner(User $model, int $idSigner)
    {
        $model->userSigner()->attach($idSigner);
    }

    /**
     * Добавить согласуемого к пользователю
     *
     * @param User $model
     * @param int $idHierarchy
     */
    public function addHierarchy(User $model, int $idHierarchy)
    {
        $model->userHierarchy()->attach($idHierarchy);
    }

    /**
     * Добавить пользователю доступ к складу
     *
     * @param User $model
     * @param int $idStorage
     */
    public function addStorage(User $model, int $idStorage)
    {
        $model->userStorage()->attach($idStorage);
    }

    /**
     * Добавить пользователю доступ к организации
     *
     * @param User $model
     * @param int $idOrganization
     */
    public function addOrganization(User $model, int $idOrganization)
    {
        $model->userOrganization()->attach($idOrganization);
    }

    /**
     * Добавить пользователю доступ к участку
     *
     * @param User $model
     * @param int $idLocation
     */
    public function addLocation(User $model, int $idLocation)
    {
        $model->userLocation()->attach($idLocation);
    }

    /**
     * Удалить все роли пользователя
     *
     * @param User $model
     */
    public function deleteAllRoles(User $model)
    {
        $model->userRole()->delete();
    }


    /**
     * Удалить все организации к которым у пользователя есть доступ
     *
     * @param User $model
     */
    public function deleteAllOrganizations(User $model)
    {
        $model->userOrganization()->delete();
    }

    /**
     * Удалить все склады к которым у пользователя есть доступ
     *
     * @param User $model
     */
    public function deleteAllStorages(User $model)
    {
        $model->userStorage()->delete();
    }

    /**
     * Удалить все участки к которым у пользователя есть доступ
     *
     * @param User $model
     */
    public function deleteAllLocations(User $model)
    {
        $model->userLocation()->delete();
    }

    /**
     * Удалить всех утвердителей пользователя
     *
     * @param User $model
     */
    public function deleteAllSigners(User $model)
    {
        $model->userSigner()->delete();
    }

    /**
     * Удалить все согласуемых пользователя
     *
     * @param User $model
     */
    public function deleteAllHierarchies(User $model)
    {
        $model->userHierarchy()->delete();
    }
}
