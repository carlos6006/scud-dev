<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ImportPaymentTransaction
 *
 * @property $id
 * @property $users_id
 * @property $identificador_transaccion
 * @property $identificador_socio_app
 * @property $nombre_socio_app
 * @property $apellido_socio_app
 * @property $identificador_viaje
 * @property $descripcion
 * @property $nombre_organizacion
 * @property $alias_organizacion
 * @property $vs_informes
 * @property $recibes
 * @property $recibes_tus_ganancias
 * @property $recibes_saldo_viajes_pagos_efectivo
 * @property $recibes_tus_ganancias_tarifa
 * @property $recibes_tus_ganancias_impuestos
 * @property $recibes_tus_ganancias_retencion_isr
 * @property $recibes_tus_ganancias_tarifa_tarifa
 * @property $recibes_tus_ganancias_impuesto_servicio
 * @property $recibes_tus_ganancias_retencion_iva
 * @property $recibes_saldo_viajes_iva_tarifas_contribuciones
 * @property $recibes_tus_ganancias_tarifa_ajuste
 * @property $recibes_tus_ganancias_tarifa_dinamica
 * @property $recibes_tus_ganancias_tarifa_espera_recoleccion
 * @property $recibes_saldo_viajes_pagos_transferencia_bancaria
 * @property $recibes_tus_ganancias_tarifa_cancelacion
 * @property $recibes_tus_ganancias_promocion_desafio
 * @property $recibes_saldo_viajes_impuestos_iva_servicio
 * @property $recibes_tus_ganancias_extra_gratificacion_usuario
 * @property $recibes_tus_ganancias_promocion_turbo
 * @property $recibes_tus_ganancias_otras_tarifas_ajuste
 * @property $recibes_ajustes_posteriores_viaje
 * @property $recibes_saldo_viajes_gastos_peaje
 * @property $recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta
 * @property $recibes_tus_ganancias_tarifa_base
 * @property $recibes_tus_ganancias_tarifa_base_iva
 * @property $recibes_saldo_viajes_reembolsos_peaje
 * @property $recibes_tus_ganancias_otras_ganancias_ajuste
 * @property $recibes_tus_ganancias_promocion_ganancia_referir
 * @property $recibes_tus_ganancias_impuestos_retencion
 * @property $recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImportPaymentTransaction extends Model
{

    static $rules = [
		'users_id' => 'required',
		'identificador_transaccion' => 'required',
		'identificador_socio_app' => 'required',
		'nombre_socio_app' => 'required',
		'apellido_socio_app' => 'required',
		'identificador_viaje' => 'required',
		'descripcion' => 'required',
		'nombre_organizacion' => 'required',
		'alias_organizacion' => 'required',
		'vs_informes' => 'required',
		'recibes' => 'required',
		'recibes_tus_ganancias' => 'required',
		'recibes_saldo_viajes_pagos_efectivo' => 'required',
		'recibes_tus_ganancias_tarifa' => 'required',
		'recibes_tus_ganancias_impuestos' => 'required',
		'recibes_tus_ganancias_retencion_isr' => 'required',
		'recibes_tus_ganancias_tarifa_tarifa' => 'required',
		'recibes_tus_ganancias_impuesto_servicio' => 'required',
		'recibes_tus_ganancias_retencion_iva' => 'required',
		'recibes_saldo_viajes_iva_tarifas_contribuciones' => 'required',
		'recibes_tus_ganancias_tarifa_ajuste' => 'required',
		'recibes_tus_ganancias_tarifa_dinamica' => 'required',
		'recibes_tus_ganancias_tarifa_espera_recoleccion' => 'required',
		'recibes_saldo_viajes_pagos_transferencia_bancaria' => 'required',
		'recibes_tus_ganancias_tarifa_cancelacion' => 'required',
		'recibes_tus_ganancias_promocion_desafio' => 'required',
		'recibes_saldo_viajes_impuestos_iva_servicio' => 'required',
		'recibes_tus_ganancias_extra_gratificacion_usuario' => 'required',
		'recibes_tus_ganancias_promocion_turbo' => 'required',
		'recibes_tus_ganancias_otras_tarifas_ajuste' => 'required',
		'recibes_ajustes_posteriores_viaje' => 'required',
		'recibes_saldo_viajes_gastos_peaje' => 'required',
		'recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta' => 'required',
		'recibes_tus_ganancias_tarifa_base' => 'required',
		'recibes_tus_ganancias_tarifa_base_iva' => 'required',
		'recibes_saldo_viajes_reembolsos_peaje' => 'required',
		'recibes_tus_ganancias_otras_ganancias_ajuste' => 'required',
		'recibes_tus_ganancias_promocion_ganancia_referir' => 'required',
		'recibes_tus_ganancias_impuestos_retencion' => 'required',
		'recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','identificador_transaccion','identificador_socio_app','nombre_socio_app','apellido_socio_app','identificador_viaje','descripcion','nombre_organizacion','alias_organizacion','vs_informes','recibes','recibes_tus_ganancias','recibes_saldo_viajes_pagos_efectivo','recibes_tus_ganancias_tarifa','recibes_tus_ganancias_impuestos','recibes_tus_ganancias_retencion_isr','recibes_tus_ganancias_tarifa_tarifa','recibes_tus_ganancias_impuesto_servicio','recibes_tus_ganancias_retencion_iva','recibes_saldo_viajes_iva_tarifas_contribuciones','recibes_tus_ganancias_tarifa_ajuste','recibes_tus_ganancias_tarifa_dinamica','recibes_tus_ganancias_tarifa_espera_recoleccion','recibes_saldo_viajes_pagos_transferencia_bancaria','recibes_tus_ganancias_tarifa_cancelacion','recibes_tus_ganancias_promocion_desafio','recibes_saldo_viajes_impuestos_iva_servicio','recibes_tus_ganancias_extra_gratificacion_usuario','recibes_tus_ganancias_promocion_turbo','recibes_tus_ganancias_otras_tarifas_ajuste','recibes_ajustes_posteriores_viaje','recibes_saldo_viajes_gastos_peaje','recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta','recibes_tus_ganancias_tarifa_base','recibes_tus_ganancias_tarifa_base_iva','recibes_saldo_viajes_reembolsos_peaje','recibes_tus_ganancias_otras_ganancias_ajuste','recibes_tus_ganancias_promocion_ganancia_referir','recibes_tus_ganancias_impuestos_retencion','recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
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


    public function obtenerSumaPorMes($mes, $año)
    {
        $usuarioActivo = 1; // Reemplaza con el ID de usuario activo
       // $usuarioActivo = Auth::id(); // Obtener el ID de usuario del inicio de sesión actual
        $resultado = $this->selectRaw('SUM(recibes) as suma_columna')
            ->where('users_id', $usuarioActivo)
            ->whereYear('vs_informes', $año)
            ->whereMonth('vs_informes', $mes)
            ->first();
//dd($resultado);
        return $resultado;
    }

}
