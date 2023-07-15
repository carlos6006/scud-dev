<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $last_access
 * @property $two_steps
 * @property $activo
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Changelog[] $changelogs
 * @property ImportBillXml[] $importBillXmls
 * @property ImportPaymentTransaction[] $importPaymentTransactions
 * @property ProfilePicture[] $profilePictures
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'activo' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
    public static function getTableSize()
    {
        $tableName = (new self())->getTable();
        $tableSize = DB::table('information_schema.tables')
            ->select(DB::raw('SUM(data_length + index_length) / 1024 as table_size'))
            ->where('table_schema', '=', config('database.connections.mysql.database'))
            ->where('table_name', '=', $tableName)
            ->groupBy('table_name')
            ->pluck('table_size')
            ->first();
            return number_format($tableSize, 2);
    }
}
