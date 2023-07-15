<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SumPayments extends Model
{
    protected $table = 'payment_summary';
    use HasFactory;

    public static function obtenerDatosPorMes($users_id,$anio)
    {
        $meses = range(1, 12);
        $datos = [];

        foreach ($meses as $mes) {
            $datosMes = self::where('users_id', $users_id)
                ->where('mes', $mes)
                ->where('anio', $anio)
                ->select('*')
                ->first();

            $datos[$mes] = $datosMes ? $datosMes->toArray() : [];
        }

        return $datos;
    }
}
