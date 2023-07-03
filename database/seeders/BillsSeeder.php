<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('import_bill_xmls')->insert([
            'users_id'=> 1,
            'Comprobante_Certificado' =>'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',
            'Comprobante_Exportacion' => '01',
            'Comprobante_Fecha' => '2023-01-02T17:58:00',
            'Comprobante_Folio' =>'1091',
            'Comprobante_FormaPago' => '28',
            'Comprobante_MetodoPago' => 'PUE',
            'Comprobante_LugarExpedicion' =>'72560',
            'Comprobante_Moneda' =>'MXN',
            'Comprobante_NoCertificado' => '00001000000513436546',
            'Comprobante_Sello' => 'wUCC+p+s7KtswRLJxYo18s/eDF95rtK6gdSJIU9QoRweMNIviABWji28pSHWzssrM7DM2eHC9EfpsjoCKtM6LvYGFvaiW3+yEVxPT68Zbk/XJ6O64k3Fcs1FH3fnwgXFfcX6Oun38k10dO43WCVIF3bIODRnhmg7dSw9oLtQggiOKX5niEOqLOH+hg3EJfsbl5Yz/0HLOAD0OpwUPCUkHtdUamS3yXlC5T20k8dCVe9w26DmJWmCPIc0wg70up+ItMjTIUB1feri6au+OPRmwF446heiM9kgU+qjXD7LXcuN/99yLsTAS6fag/Fk/sIbIQY7RrxoiWBTe5BGXDoqyA==',
            'Comprobante_Serie' => 'CWEB',
            'Comprobante_SubTotal' => 524.94,
            'Comprobante_TipoDeComprobante' => 'I',
            'Comprobante_Total' => 606.22,
            'Comprobante_Version' => 4.0,

            'Emisor_RFC' => 'SCO001110PV4',
            'Emisor_RegimenFiscal' => '601',
            'Emisor_Nombre' => 'SERVICIO COLIBRI',

            'Receptor_DomicilioFiscal' => '74125',
            'Receptor_Nombre' => 'JUAN CARLOS ALVAREZ SARTILLO',
            'Receptor_RegimenFiscal' => '625',
            'Receptor_RFC' => 'AASJ891002EW8',
            'Receptor_UsoCFDI' => 'G03',

            'Concepto_Cantidad' => '26.611765',
            'Concepto_ClaveProdServ' => '15101515',
            'Concepto_ClaveUnidad' => 'LTR',
            'Concepto_Descripcion' => 'PREMIUM',
            'Concepto_Importe' => '524.94',
            'Concepto_NoIdentificacion' =>'PL/8756/EXP/ES/2015-35860' ,
            'Concepto_ObjetoImp' =>'02' ,
            'Concepto_Unidad' => 'LTR Litro',
            'Concepto_ValorUnitario' =>'19.725862' ,

            'Traslado_Base' => '002',
            'Traslado_Importe' => '81.28',
            'Traslado_Impuesto' => '002',
            'Traslado_TasaOCuota' => '0.160000',
            'Traslado_TipoFactor' => 'Tasa',

            'Tfd_FechaTimbrado' => '2023-01-02T17:58:02',
            'Tfd_NoCertificadoSAT' => '00001000000504204971',
            'Tfd_RfcProvCertif' => 'PPD101129EA3',
            'Tfd_SelloCFD' => 'wUCC+p+s7KtswRLJxYo18s/eDF95rtK6gdSJIU9QoRweMNIviABWji28pSHWzssrM7DM2eHC9EfpsjoCKtM6LvYGFvaiW3+yEVxPT68Zbk/XJ6O64k3Fcs1FH3fnwgXFfcX6Oun38k10dO43WCVIF3bIODRnhmg7dSw9oLtQggiOKX5niEOqLOH+hg3EJfsbl5Yz/0HLOAD0OpwUPCUkHtdUamS3yXlC5T20k8dCVe9w26DmJWmCPIc0wg70up+ItMjTIUB1feri6au+OPRmwF446heiM9kgU+qjXD7LXcuN/99yLsTAS6fag/Fk/sIbIQY7RrxoiWBTe5BGXDoqyA==',
            'Tfd_SelloSAT' => 'I/F4dglVdoA3msEPfaYgAxPlUsjlbo9a9dh40bpmCCsa8dz3taR4uZwvG8eYO73NJ5UpgE13eGaCAKF/QMbt1/W9kXkAcM9e6T8L7qcjc8SLYH6JtdXTTZzQ6VL9m3RD8fAnhfnbIZ8TlcPMPwjRUX2Bq29tdNm08t+N8KIPRgNSWZZWbTQk0smAHzqwIwEiHzO7V7KJee+khnnhFeG6vnGJmlUk+BPCQjw3rXcsXauI3iZIjqbgWnu7law6c58x0oHrWPmNJ8D8FIrERtZcbML9aj/Pn1Z7ZIZxH6L8nOd02431fGv/QpW/xuT/bBqZ7v0USF0K6XCLdik4FBDdTQ==',
            'Tfd_UUID' => '957E3751-F797-4FC7-86AF-E135F80D9D5A',
            'Tfd_Version' => '1.1',

        ]);



    }
}
