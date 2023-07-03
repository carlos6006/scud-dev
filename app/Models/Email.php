<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Email
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $rfc
 * @property $email_address
 * @property $password
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
		'rfc' => 'required',
		'email_address' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','rfc','email_address'];



}
