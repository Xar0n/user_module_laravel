<?php

namespace App\User\Models;

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
 * @property int     $organization_id
 * @property int     $location_id
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
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
        'organization_id',
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
}
