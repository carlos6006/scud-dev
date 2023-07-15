<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Type
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Changelog[] $changelogs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Type extends Model
{

    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function changelogs()
    {
        return $this->hasMany('App\Models\Changelog', 'type_id', 'id');
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
