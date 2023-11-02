<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysValue extends Model
{
    use HasFactory;

    protected $table = 'sys_values';

    protected $fillable = [
        'setting_name',
        'value',
        'description',
        'last_updated',
        // Agrega más columnas según tus necesidades
    ];
}
