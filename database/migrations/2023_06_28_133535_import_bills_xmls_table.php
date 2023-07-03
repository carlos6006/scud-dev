<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('import_bill_xmls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            // Valores de Comprobante del XML
            $table->text('Comprobante_Certificado')->nullable();
            $table->string('Comprobante_Exportacion')->nullable();
            $table->string('Comprobante_Fecha')->nullable();
            $table->string('Comprobante_Folio')->nullable();
            $table->string('Comprobante_FormaPago')->nullable();
            $table->string('Comprobante_MetodoPago')->nullable();
            $table->string('Comprobante_LugarExpedicion')->nullable();
            $table->string('Comprobante_Moneda')->nullable();
            $table->string('Comprobante_NoCertificado')->nullable();
            $table->string('Comprobante_Sello',1000)->nullable();
            $table->string('Comprobante_Serie')->nullable();
            $table->string('Comprobante_SubTotal')->nullable();
            $table->char('Comprobante_TipoDeComprobante')->nullable();
            $table->string('Comprobante_Total')->nullable();
            $table->string('Comprobante_Version')->nullable();
            // Valores de Emisor del XML
            $table->string('Emisor_RFC')->nullable();
            $table->string('Emisor_RegimenFiscal')->nullable();
            $table->string('Emisor_Nombre')->nullable();
            // Valores de Receptor del XML
            $table->string('Receptor_DomicilioFiscal')->nullable();
            $table->string('Receptor_Nombre')->nullable();
            $table->string('Receptor_RegimenFiscal')->nullable();
            $table->string('Receptor_RFC')->nullable();
            $table->string('Receptor_UsoCFDI')->nullable();
            // Valores de Concepto del XML
            $table->string('Concepto_Cantidad')->nullable();
            $table->string('Concepto_ClaveProdServ')->nullable();
            $table->string('Concepto_ClaveUnidad')->nullable();
            $table->string('Concepto_Descripcion')->nullable();
            $table->string('Concepto_Importe')->nullable();
            $table->string('Concepto_NoIdentificacion')->nullable();
            $table->string('Concepto_ObjetoImp')->nullable();
            $table->string('Concepto_Unidad')->nullable();
            $table->string('Concepto_ValorUnitario')->nullable();
             // Valores de Ttraslado del XML
             $table->string('Traslado_Base')->nullable();
             $table->string('Traslado_Importe')->nullable();
             $table->string('Traslado_Impuesto')->nullable();
             $table->string('Traslado_TasaOCuota')->nullable();
             $table->string('Traslado_TipoFactor')->nullable();
            // Valores de Tdf del XML
            $table->string('Tfd_FechaTimbrado')->nullable();
            $table->string('Tfd_NoCertificadoSAT')->nullable();
            $table->string('Tfd_RfcProvCertif')->nullable();
            $table->text('Tfd_SelloCFD')->nullable();
            $table->text('Tfd_SelloSAT',200)->nullable();
            $table->string('Tfd_UUID')->nullable();
            $table->string('Tfd_Version')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
