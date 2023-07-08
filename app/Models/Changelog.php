<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Changelog
 *
 * @property $id
 * @property $user_id
 * @property $version
 * @property $type_id
 * @property $titulo
 * @property $descripcion
 * @property $categori_id
 * @property $ruta
 * @property $fecha_actualizacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Type $type
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Changelog extends Model
{

    static $rules = [
		'user_id' => 'required',
		'version' => 'required',
		'type_id' => 'required',
		'titulo' => 'required',
		'categori_id' => 'required',
		'fecha_actualizacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','version','type_id','titulo','descripcion','categori_id','ruta','fecha_actualizacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        //return $this->belongsTo(Category::class);
        return $this->hasOne('App\Models\Category', 'id', 'categori_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
       //return $this->belongsTo(Type::class);
       return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        //eturn $this->belongsTo(User::class);
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public static function getTableSize()
    {
        $tableName = (new self())->getTable();
        $tableSize = DB::table('information_schema.tables')
            ->select(DB::raw('SUM(data_length + index_length) / 1024 as table_size'))
            ->where('table_schema', '=', env('DB_DATABASE'))
            ->where('table_name', '=', $tableName)
            ->groupBy('table_name')
            ->pluck('table_size')
            ->first();

            return number_format($tableSize, 2);
    }

}
