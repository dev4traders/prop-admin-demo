<?php

namespace App\Models;

use Dcat\Admin\Models\Administrator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @OA\Schema(
 *     schema="User",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID пользователя"),
 *     @OA\Property(property="name", type="string", description="Имя пользователя"),
 *     @OA\Property(property="email", type="string", format="email", description="Email пользователя"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Дата и время создания пользователя"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Дата и время последнего обновления пользователя"),
 * )
 */
class User extends Administrator implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable;
}
