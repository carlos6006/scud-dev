<?php

namespace App\Http\Controllers;

use App\Models\ImportBillXml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


/**
 * Class ImportBillXmlController
 * @package App\Http\Controllers
 */
class ImportBillXmlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importBillXmls = ImportBillXml::paginate();

        return view('import-bill-xml.index', compact('importBillXmls'))
            ->with('i', (request()->input('page', 1) - 1) * $importBillXmls->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $importBillXml = new ImportBillXml();
        return view('import-bill-xml.create', compact('importBillXml'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ImportBillXml::$rules);

        $importBillXml = ImportBillXml::create($request->all());

        return redirect()->route('import-bill-xmls.index')
            ->with('success', 'ImportBillXml created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $importBillXml = ImportBillXml::find($id);

        return view('import-bill-xml.show', compact('importBillXml'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $importBillXml = ImportBillXml::find($id);

        return view('import-bill-xml.edit', compact('importBillXml'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImportBillXml $importBillXml
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportBillXml $importBillXml)
    {
        request()->validate(ImportBillXml::$rules);

        $importBillXml->update($request->all());

        return redirect()->route('import-bill-xmls.index')
            ->with('success', 'ImportBillXml updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $importBillXml = ImportBillXml::find($id)->delete();

        return redirect()->route('import-bill-xmls.index')
            ->with('success', 'ImportBillXml deleted successfully');
    }
    public function import(Request $request)
    {

        $request->validate([
            'xml_file' => 'required|file|mimes:xml'
        ]);

        // Obtener el archivo XML cargado
        $archivo = $request->file('xml_file');
        $rutaArchivo = $archivo->getPathname();

        // Cargar el archivo XML
        $xml = simplexml_load_file($rutaArchivo);


        $ns = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
        $xml->registerXPathNamespace('t', $ns['tfd']);

        // Obtener todos los elementos "TimbreFiscalDigital" del XML
        $timbres = $xml->xpath('//t:TimbreFiscalDigital');
        foreach ($timbres as $tfd) {
            $uuid = (string) $tfd['UUID'];
            $archivoExistente = ImportBillXml::where('Tfd_UUID', $uuid)->exists();
            if ($archivoExistente==true) {
                Alert::warning('¡Advertencia!', 'El archivo ya ha sido cargado anteriormente.')->flash();
                // Redirecciona a la página anterior
                return redirect()->back();
            }else {
                    // Crear un arreglo para almacenar los datos a insertar
                    //return 'El archivo no existe.';
                    $datos = [];
                    $datos['users_id'] = Auth::user()->id; // Agregar el ID del usuario
                    // EMPIEZO A LEER LA INFORMACION DEL CFDI E INSERTARLA EN EL ARREGLO DE DATOS
                    foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
                        $datos['Comprobante_Certificado'] = (string)$cfdiComprobante['Certificado'];
                        $datos['Comprobante_Exportacion'] = (string)$cfdiComprobante['Exportacion'];
                        $datos['Comprobante_Fecha'] = (string)$cfdiComprobante['Fecha'];
                        $datos['Comprobante_Folio'] = (string)$cfdiComprobante['Folio'];
                        $datos['Comprobante_FormaPago'] = (string)$cfdiComprobante['FormaPago'];
                        $datos['Comprobante_MetodoPago'] = (string)$cfdiComprobante['MetodoPago'];
                        $datos['Comprobante_LugarExpedicion'] = (string)$cfdiComprobante['LugarExpedicion'];
                        $datos['Comprobante_Moneda'] = (string)$cfdiComprobante['Moneda'];
                        $datos['Comprobante_NoCertificado'] = (string)$cfdiComprobante['NoCertificado'];
                        $datos['Comprobante_Sello'] = (string)$cfdiComprobante['Sello'];
                        $datos['Comprobante_Serie'] = (string)$cfdiComprobante['Serie'];
                        $datos['Comprobante_SubTotal'] = (string)$cfdiComprobante['SubTotal'];
                        $datos['Comprobante_TipoDeComprobante'] = (string)$cfdiComprobante['TipoDeComprobante'];
                        $datos['Comprobante_Total'] = (string)$cfdiComprobante['Total'];
                        $datos['Comprobante_Version'] = (string)$cfdiComprobante['Version'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
                        $datos['Emisor_Rfc'] = (string)$Emisor['Rfc'];
                        $datos['Emisor_Nombre'] = (string)$Emisor['Nombre'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){
                        $datos['DomicilioFiscalEmisor_Pais'] = (string)$ExpedidoEn['Pais'];
                        $datos['DomicilioFiscalEmisor_Calle'] = (string)$ExpedidoEn['Calle'];
                        $datos['DomicilioFiscalEmisor_Estado'] = (string)$ExpedidoEn['Estado'];
                        $datos['DomicilioFiscalEmisor_Colonia'] = (string)$ExpedidoEn['Colonia'];
                        $datos['DomicilioFiscalEmisor_Municipio'] = (string)$ExpedidoEn['Municipio'];
                        $datos['DomicilioFiscalEmisor_NoExterior'] = (string)$ExpedidoEn['NoExterior'];
                        $datos['DomicilioFiscalEmisor_CodigoPostal'] = (string)$ExpedidoEn['CodigoPostal'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
                        $datos['Receptor_Rfc'] = (string)$Receptor['Rfc'];
                        $datos['Receptor_Nombre'] = (string)$Receptor['Nombre'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){
                        $datos['DomicilioFiscalReceptor_Pais'] = (string)$ReceptorDomicilio['Pais'];
                        $datos['DomicilioFiscalReceptor_Calle'] = (string)$ReceptorDomicilio['Calle'];
                        $datos['DomicilioFiscalReceptor_Estado'] = (string)$ReceptorDomicilio['Estado'];
                        $datos['DomicilioFiscalReceptor_Colonia'] = (string)$ReceptorDomicilio['Colonia'];
                        $datos['DomicilioFiscalReceptor_Municipio'] = (string)$ReceptorDomicilio['Municipio'];
                        $datos['DomicilioFiscalReceptor_NoExterior'] = (string)$ReceptorDomicilio['NoExterior'];
                        $datos['DomicilioFiscalReceptor_CodigoPostal'] = (string)$ReceptorDomicilio['CodigoPostal'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
                        $datos['Concepto_Unidad'] = (string)$Concepto['Unidad'];
                        $datos['Concepto_Importe'] = (string)$Concepto['Importe'];
                        $datos['Concepto_Descripcion'] = (string)$Concepto['Cantidad'];
                        $datos['Concepto_Descripcion'] = (string)$Concepto['Descripcion'];
                        $datos['Concepto_ValorUnitario'] = (string)$Concepto['ValorUnitario'];
                    }
                    foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
                        $datos['Traslado_Tasa'] = (string)$Traslado['Tasa'];
                        $datos['Traslado_Importe'] = (string)$Traslado['Importe'];
                        $datos['Traslado_Impuesto'] = (string)$Traslado['Impuesto'];
                    }

                    foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
                        $datos['Tfd_SelloCFD'] = (string)$tfd['SelloCFD'];
                        $datos['Tfd_FechaTimbrado'] = (string)$tfd['FechaTimbrado'];
                        $datos['Tfd_UUID'] = (string)$tfd['UUID'];
                        $datos['Tfd_NoCertificadoSAT'] = (string)$tfd['NoCertificadoSAT'];
                        $datos['Tfd_Version'] = (string)$tfd['Version'];
                        $datos['Tfd_SelloSAT'] = (string)$tfd['SelloSAT'];
                    }
                    // Insertar los datos en la base de datos

                    $insertado = ImportBillXml::create($datos);
                    if ($insertado) {
                        Alert::success('¡Carga exitosa!', 'El archivo ha sido cargado correctamente.')->flash();
                        // Redirecciona a la página anterior
                        return redirect()->back();
                    } else {
                        Alert::error('¡Error!', 'El archivo no ha sido cargado correctamente.')->flash();
        // Redirecciona a la página anterior
        return redirect()->back();
                    }


            }
        }
    }
}
