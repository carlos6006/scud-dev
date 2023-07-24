<?php

namespace App\Http\Controllers;

use App\Models\ImportPaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class ImportPaymentTransactionController
 * @package App\Http\Controllers
 */
class ImportPaymentTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            // Si el usuario tiene el rol de "Admin", mostrar todos los registros
            $importPaymentTransactions = ImportPaymentTransaction::paginate();
        } else {
            // Si no, mostrar solo los registros del usuario logueado
            $importPaymentTransactions = ImportPaymentTransaction::where('user_id', $user->id)->paginate();
        }

        // Obtener el tamaño de la tabla
        $tableSize = ImportPaymentTransaction::getTableSize();

        // Pasar la variable de paginación a la vista
        return view('import-payment-transaction.index', compact('importPaymentTransactions', 'tableSize'))
            ->with('i', (request()->input('page', 1) - 1) * $importPaymentTransactions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($request);
         $importPaymentTransaction = new ImportPaymentTransaction();
         return view('import-payment-transaction.create', compact('importPaymentTransaction'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ImportPaymentTransaction::$rules);

        $importPaymentTransaction = ImportPaymentTransaction::create($request->all());

        return redirect()->route('import-payment-transactions.index')
            ->with('success', 'ImportPaymentTransaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $importPaymentTransaction = ImportPaymentTransaction::find($id);

        return view('import-payment-transaction.show', compact('importPaymentTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $importPaymentTransaction = ImportPaymentTransaction::find($id);

        return view('import-payment-transaction.edit', compact('importPaymentTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImportPaymentTransaction $importPaymentTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportPaymentTransaction $importPaymentTransaction)
    {
        request()->validate(ImportPaymentTransaction::$rules);

        $importPaymentTransaction->update($request->all());

        return redirect()->route('import-payment-transactions.index')
            ->with('success', 'ImportPaymentTransaction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $importPaymentTransaction = ImportPaymentTransaction::find($id)->delete();

        return redirect()->route('import-payment-transactions.index')
            ->with('success', 'ImportPaymentTransaction deleted successfully');
    }



    public function import(Request $request)
    {
        $file = $request->file('csv_file');

        // Validar y procesar el archivo CSV
        if ($file->isValid() && $file->getClientOriginalExtension() === 'csv') {
            $path = $file->path();

            // Leer el contenido del archivo y eliminar el BOM
            $content = file_get_contents($path);
            $content = preg_replace('/^\xEF\xBB\xBF/', '', $content);
            file_put_contents($path, $content);

            $data = array_map('str_getcsv', file($path));

            // Eliminar la primera fila si es un encabezado
            $headers = array_shift($data);

            // Mapear los nombres de encabezado con el nombre de columna correspondiente
            $columnMapping = [
                'identificador único universal (UUID) de la transacción' => 'identificador_transaccion',
                'Identificador único universal (UUID) del socio de la App' => 'identificador_socio_app',
                'Nombre del socio de la App' => 'nombre_socio_app',
                'Apellido del socio de la App' => 'apellido_socio_app',
                'Identificador único universal (UUID) del viaje' => 'identificador_viaje',
                'Descripción' => 'descripcion',
                'Nombre de la organización' => 'nombre_organizacion',
                'Alias de la organización' => 'alias_organizacion',
                'vs. informes' => 'vs_informes',
                'Recibes' => 'recibes',
                'Recibes : Tus ganancias' => 'recibes_tus_ganancias',
                'Recibes : Saldo de viajes : Pagos : Efectivo recibido' => 'recibes_saldo_viajes_pagos_efectivo',
                'Recibes : Tus ganancias : Tarifa' => 'recibes_tus_ganancias_tarifa',
                'Recibes : Tus ganancias : Impuestos' => 'recibes_tus_ganancias_impuestos',
                'Recibes:Tus ganancias:Impuestos:Retención del impuesto sobre la renta' => 'recibes_tus_ganancias_retencion_isr',
                'Recibes:Tus ganancias:Tarifa:Tarifa' => 'recibes_tus_ganancias_tarifa_tarifa',
                'Recibes:Tus ganancias:Impuestos:Impuesto sobre la tasa de servicio' => 'recibes_tus_ganancias_impuesto_servicio',
                'Recibes:Tus ganancias:Impuestos:Retención de IVA' => 'recibes_tus_ganancias_retencion_iva',
                'Recibes:Saldo de viajes:Impuesto:IVA sobre tarifas/contribuciones' => 'recibes_saldo_viajes_iva_tarifas_contribuciones',
                'Recibes:Tus ganancias:Tarifa:Ajuste' => 'recibes_tus_ganancias_tarifa_ajuste',
                'Recibes:Tus ganancias:Tarifa:Tarifa dinámica' => 'recibes_tus_ganancias_tarifa_dinamica',
                'Recibes:Tus ganancias:Tarifa:Tiempo de espera en el momento de la recolección' => 'recibes_tus_ganancias_tarifa_espera_recoleccion',
                'Recibes:Saldo de viajes:Pagos:Se transfirió a la cuenta bancaria' => 'recibes_saldo_viajes_pagos_transferencia_bancaria',
                'Recibes:Tus ganancias:Tarifa:Cancelación' => 'recibes_tus_ganancias_tarifa_cancelacion',
                'Recibes:Tus ganancias:Promoción:Desafío' => 'recibes_tus_ganancias_promocion_desafio',
                'Recibes:Saldo de viajes:Impuestos:IVA sobre la tasa de servicio' => 'recibes_saldo_viajes_impuestos_iva_servicio',
                'Recibes:Tus ganancias:Extra (gratificación dada por el usuario)' => 'recibes_tus_ganancias_extra_gratificacion_usuario',
                'Recibes:Tus ganancias:Promoción:Turbo+' => 'recibes_tus_ganancias_promocion_turbo',
                'Recibes:Tus ganancias:Otras tarifas:Ajuste' => 'recibes_tus_ganancias_otras_tarifas_ajuste',
                'Recibes:Ajustes posteriores al viaje' => 'recibes_ajustes_posteriores_viaje',
                'Recibes:Saldo de viajes:Gastos:Peaje' => 'recibes_saldo_viajes_gastos_peaje',
                'Recibes:Saldo de viajes:Reembolsos:Depósito de validación de cuenta' => 'recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta',
                'Recibes:Tus ganancias:Tarifa:Tarifa base' => 'recibes_tus_ganancias_tarifa_base',
                'Recibes:Tus ganancias:Tarifa:IVA de la tarifa base' => 'recibes_tus_ganancias_tarifa_base_iva',
                'Recibes:Saldo de viajes:Reembolsos:Peaje' => 'recibes_saldo_viajes_reembolsos_peaje',
                'Recibes:Tus ganancias:Otras ganancias:Ajuste' => 'recibes_tus_ganancias_otras_ganancias_ajuste',
                'Recibes:Tus ganancias:Promoción:Ganancia adicional por referir' => 'recibes_tus_ganancias_promocion_ganancia_referir',
                'Recibes:Tus ganancias:Impuestos:Retención de impuestos' => 'recibes_tus_ganancias_impuestos_retencion',
                'Recibes:Tus ganancias:Tarifa:Tarifa de cancelación extra por tiempo de espera adicional' => 'recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional',
                // Agregar más nombres de encabezado y asignar el nombre de columna correspondiente

            ];

           // Verificar columnas adicionales
        $extraColumns = array_diff($headers, array_keys($columnMapping));
        if (!empty($extraColumns)) {
            $errorMessage = 'El archivo contiene columnas adicionales: ' . implode(', ', $extraColumns);
           //dd($extraColumns);
            Alert::error('¡Error!', $errorMessage)->autoClose(500000)->flash();
            return redirect()->back();
        }

        // Recorrer los datos y almacenarlos en la base de datos
        foreach ($data as $row) {
            $rowData = [];

            foreach ($headers as $index => $header) {
                if (isset($columnMapping[$header])) {
                    $columnName = $columnMapping[$header];
                    $columnValue = isset($row[$index]) ? $row[$index] : null;
                    $rowData[$columnName] = $columnValue;
                }
            }

             // Check if "identificador_transaccion" already exists in the database
             $identificadorTransaccion = $rowData['identificador_transaccion'];
             $existingRecord = ImportPaymentTransaction::where('identificador_transaccion', $identificadorTransaccion)->first();



            if (!$existingRecord) {
            // Insertar todas las columnas disponibles en la base de datos
            $rowData['users_id'] = Auth::user()->id; // Agregar el ID del usuario
            ImportPaymentTransaction::create($rowData);
        } else {
            Alert::error('Error', 'El archivo ya ha sido cargado previamente. Por favor, asegúrate de que solo se cargue una vez.')->autoClose(50000)->flash();
            return redirect()->back();

        }
        }

        Alert::success('¡Carga exitosa!', 'El archivo ha sido cargado correctamente.')->autoClose(50000)->flash();
        return redirect()->back();
    }

    Alert::error('¡Error!', 'El archivo no ha sido cargado correctamente.')->autoClose(50000)->flash();
    return redirect()->back();
}}
