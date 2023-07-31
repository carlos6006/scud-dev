<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * Class Email
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $rfc
 * @property $email_address
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Email extends Model
{

    static $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
        'password' => 'required',
		'email_address' => 'required',
    ];

   // protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'rfc', 'password', 'email_address'];

    // Mutator for password attribute
    //public function setPasswordAttribute($password)
   // {
    //    $this->attributes['password'] = Hash::make($password);
    //}



}
