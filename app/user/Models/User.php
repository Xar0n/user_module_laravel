<?php

namespace App\User\Models;

use App\Models\UserBase;
use App\Models\UserDivision;
use App\Models\UserPost;
use App\Models\UserStorage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package App\User\Models
 * @property boolean    $gender
 * @property string     $login
 * @property string     $password
 * @property string     $fio
 * @property string     $email
 * @property string     $phone
 * @property string     $telegram
//* @property string     $my_snab_sign
 * @property string     $avatar
 * @property boolean    $status
 * @property boolean    $fired
// * @property int        $truck
// * @property boolean    $not_sign_mode
 * @property int        $become_user
 * @property int        $organization_id
 * @property int        $division_id
 * @property int        $post_id
 * @property int        $base_id
 * @property int        $location_id
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * Таблица базы данных, используемая моделью.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Указывает, должна ли модель иметь временную метку.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Атрибуты, которые можно назначать массово.
     *
     * @var string[]
     */
    protected $fillable = [
        'gender',
        'login',
        'password',
        'fio',
        'email',
        'phone',
        'telegram',
        'avatar',
        'status',
        'fired',
        'become_user',
        'organization_id',
        'division_id',
        'post_id',
        'base_id',
        'location_id'
    ];

    /**
     * Атрибуты, которые должны быть скрыты для массивов.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Атрибуты, которые следует приводить к собственным типам.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Организация, принадлежащая пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(UserOrganization::class, 'organization_id');
    }

    /**
     * Участок, принадлежащий пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(UserLocation::class, 'location_id');
    }

    /**
     * База, принадлежащая пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function base()
    {
        return $this->belongsTo(UserBase::class, 'base_id');
    }

    /**
     * Должность, принадлежащая пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(UserPost::class, 'post_id');
    }

    /**
     * Подразделение, принадлежащее пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(UserDivision::class, 'division_id');
    }

    /**
     * Пользователь от которого произошел данный пользователь.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'become_user');
    }

    /**
     * Роли, принадлежащие пользователю.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userRole()
    {
        return $this->belongsToMany(UserRole::class, 'users_users_roles', 'user_id', 'role_id');
    }

    /**
     * Организации к которым у пользователя есть доступ.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userOrganization()
    {
        return $this->belongsToMany(UserRole::class, 'users_users_roles', 'user_id', 'role_id');
    }

    /**
     * Участки к которым у пользователя есть доступ.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userLocation()
    {
        return $this->belongsToMany(UserRole::class, 'users_users_location', 'user_id', 'location_id');
    }

    /**
     * Склады к которым у пользователя есть доступ.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userStorage()
    {
        return $this->belongsToMany(UserStorage::class, 'users_users_storages', 'user_id', 'storage_id');
    }

    /**
     * Согласуемые пользователя.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userHierarchie()
    {
        return $this->belongsToMany(User::class, 'users_users_hierarchies', 'user_id', 'users_id');
    }

    /**
     * Утвердители пользователя.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userSigner()
    {
        return $this->belongsToMany(User::class, 'users_users_signers', 'user_id', 'signer_id');
    }
}
