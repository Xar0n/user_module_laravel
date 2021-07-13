<?php

namespace App\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserGroup
 *
 * @package App\User\Models
 * @property string     $name
 *
 * Модель для групп
 */
class UserGroup extends Model
{
    use HasFactory;
    /**
     * Таблица базы данных, используемая моделью.
     *
     * @var string
     */
    protected $table = 'users_groups';

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
        'name'
    ];

    /**
     * Роли, принадлежащие группе.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userRole()
    {
        return $this->belongsToMany(UserRole::class, 'users_groups_roles', 'group_id', 'role_id');
    }
}
