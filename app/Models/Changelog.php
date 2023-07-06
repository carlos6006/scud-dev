<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne('App\Models\Category', 'id', 'categori_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'id', 'type_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
