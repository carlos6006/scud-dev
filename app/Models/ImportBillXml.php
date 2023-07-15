<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ImportBillXml
 *
 * @property $id
 * @property $users_id
 * @property $Comprobante_Certificado
 * @property $Comprobante_Exportacion
 * @property $Comprobante_Fecha
 * @property $Comprobante_Folio
 * @property $Comprobante_FormaPago
 * @property $Comprobante_MetodoPago
 * @property $Comprobante_LugarExpedicion
 * @property $Comprobante_Moneda
 * @property $Comprobante_NoCertificado
 * @property $Comprobante_Sello
 * @property $Comprobante_Serie
 * @property $Comprobante_SubTotal
 * @property $Comprobante_TipoDeComprobante
 * @property $Comprobante_Total
 * @property $Comprobante_Version
 * @property $Emisor_RFC
 * @property $Emisor_RegimenFiscal
 * @property $Emisor_Nombre
 * @property $Receptor_DomicilioFiscal
 * @property $Receptor_Nombre
 * @property $Receptor_RegimenFiscal
 * @property $Receptor_RFC
 * @property $Receptor_UsoCFDI
 * @property $Concepto_Cantidad
 * @property $Concepto_ClaveProdServ
 * @property $Concepto_ClaveUnidad
 * @property $Concepto_Descripcion
 * @property $Concepto_Importe
 * @property $Concepto_NoIdentificacion
 * @property $Concepto_ObjetoImp
 * @property $Concepto_Unidad
 * @property $Concepto_ValorUnitario
 * @property $Traslado_Base
 * @property $Traslado_Importe
 * @property $Traslado_Impuesto
 * @property $Traslado_TasaOCuota
 * @property $Traslado_TipoFactor
 * @property $Tfd_FechaTimbrado
 * @property $Tfd_NoCertificadoSAT
 * @property $Tfd_RfcProvCertif
 * @property $Tfd_SelloCFD
 * @property $Tfd_SelloSAT
 * @property $Tfd_UUID
 * @property $Tfd_Version
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImportBillXml extends Model
{

    static $rules = [
		'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','Comprobante_Certificado','Comprobante_Exportacion','Comprobante_Fecha','Comprobante_Folio','Comprobante_FormaPago','Comprobante_MetodoPago','Comprobante_LugarExpedicion','Comprobante_Moneda','Comprobante_NoCertificado','Comprobante_Sello','Comprobante_Serie','Comprobante_SubTotal','Comprobante_TipoDeComprobante','Comprobante_Total','Comprobante_Version','Emisor_RFC','Emisor_RegimenFiscal','Emisor_Nombre','Receptor_DomicilioFiscal','Receptor_Nombre','Receptor_RegimenFiscal','Receptor_RFC','Receptor_UsoCFDI','Concepto_Cantidad','Concepto_ClaveProdServ','Concepto_ClaveUnidad','Concepto_Descripcion','Concepto_Importe','Concepto_NoIdentificacion','Concepto_ObjetoImp','Concepto_Unidad','Concepto_ValorUnitario','Traslado_Base','Traslado_Importe','Traslado_Impuesto','Traslado_TasaOCuota','Traslado_TipoFactor','Tfd_FechaTimbrado','Tfd_NoCertificadoSAT','Tfd_RfcProvCertif','Tfd_SelloCFD','Tfd_SelloSAT','Tfd_UUID','Tfd_Version'];


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


}
