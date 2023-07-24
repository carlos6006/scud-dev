<table id="table" namne="table" class="table table-striped table-responsive my-2">
    <thead>
        <tr>
            <th scope="col" class="col-1 text-center"></th>
            <th>ENERO</th>
            <th>FEBRERO</th>
            <th>MARZO</th>
            <th>ABRIL</th>
            <th>MAYO</th>
            <th>JUNIO</th>
            <th>JULIO</th>
            <th>AGOSTO</th>
            <th>SEPTIEMBRE</th>
            <th>OCTUBRE</th>
            <th>NOVIEMBRE</th>
            <th>DICIEMBRE</th>
            <th>SUMA</th>
        </tr>
    </thead>
    <tbody>
        <tr class="cell-1 collapsed" data-toggle="collapse" data-target="#gananciaTarifa">
            <th scope="row"><button type="button" class="btn btn-link p-0" onclick="toggleIconPosition(this)">
                    <i class=" fas fa-caret-right fa-fw"></i></button> Recibes: Tus ganancias: Tarifa
            </th>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td>@php  $sumaRecibes_tus_ganancias_tarifa = 0; @endphp
                @foreach (range(1, 12) as $mes)
                    @php
                        $valor = $resultados[$mes]['recibes_tus_ganancias_tarifa'] ?? null;
                        $sumaRecibes_tus_ganancias_tarifa += $valor;
                    @endphp
                @endforeach
                {{ '$' . number_format($sumaRecibes_tus_ganancias_tarifa, 2, '.', ',') }}
        </tr>
        <tr id="gananciaTarifa" class="cell-1 row-child collapse">
            <td scope="row">Recibes:Tus ganancias:Tarifa:Ajuste</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_ajuste'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
         <td></td>
        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Tarifa de cancelación extra por tiempo de
                espera
                adicional</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
             <td></td>
        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Tarifa</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_tarifa'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor

            <td></td>
        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Tarifa dinámica</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_dinamica'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>

        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Cancelación </td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_cancelacion'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor

            <td></td>

        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Tiempo de espera en el momento de la
                recolección</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_espera_recoleccion'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:Tarifa base</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_base'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor

             <td></td>
        </tr>
        <tr id="gananciaTarifa" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus
                ganancias:Tarifa:IVA de la tarifa base</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_tarifa_base_iva'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor

            <td></td>
        </tr>
        <tr class="cell-1 table-active" data-toggle="collapse" data-target="#demo-4">
            <td scope="row" class="text-wrap font-weight-bold" style="text-align: right;">Total:</td>
            @php
    $columnas = [
        'recibes_tus_ganancias_tarifa_ajuste',
        'recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional',
        'recibes_tus_ganancias_tarifa_tarifa',
        'recibes_tus_ganancias_tarifa_dinamica',
        'recibes_tus_ganancias_tarifa_cancelacion',
        'recibes_tus_ganancias_tarifa_espera_recoleccion',
        'recibes_tus_ganancias_tarifa_base',
        'recibes_tus_ganancias_tarifa_base_iva',
    ];
@endphp

@foreach ($resultados as $mes => $datosMes)
    @php
        $totalMes = 0;
    @endphp

    @foreach ($columnas as $columna)
        @php
            $totalMes += $datosMes[$columna] ?? 0;
        @endphp
    @endforeach

    <td>{{ '$' . number_format($totalMes, 2, '.', ',') }}</td>
@endforeach
            <td></td>
        </tr>


        <tr class="cell-1 collapsed" data-toggle="collapse" data-target="#recibesGanancia">
            <th scope="row">
                <button type="button" class="btn btn-link p-0" onclick="toggleIconPosition(this)">
                    <i class=" fas fa-caret-right fa-fw"></i>
                </button>Recibes: Tus ganancias
            </th>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>

        </tr>
        <tr id="recibesGanancia" class="cell-1 row-child collapse">
            <td scope="row">Recibes:Tus ganancias:Promoción:Desafío</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_promocion_desafio'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Promoción:Ganancia adicional por referir
            </td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_promocion_ganancia_referir'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Promoción:Turbo+</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_promocion_turbo'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Extra (gratificación dada por el usuario)
            </td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_extra_gratificacion_usuario'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>

        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Impuestos:Impuesto sobre la tasa de
                servicio</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_impuesto_servicio'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>

        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Impuestos:Retención de IVA</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_retencion_iva'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Impuestos:Retención del impuesto sobre la
                renta</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_retencion_isr'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Otras ganancias:Ajuste</td>
            @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_otras_ganancias_ajuste'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes : Tus ganancias : Impuestos</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_impuestos'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Otras tarifas:Ajuste</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_otras_tarifas_ajuste'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesGanancia" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Tus ganancias:Impuestos:Retención de impuestos</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_tus_ganancias_impuestos_retencion'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr class="cell-1 table-active" data-toggle="collapse" data-target="#demo-4">
            <td scope="row" class="text-wrap font-weight-bold" style="text-align: right;">Total:</td>

            @php
            $columnasGrupoDos = [
                'recibes_tus_ganancias_tarifa',
                'recibes_tus_ganancias_promocion_desafio',
                'recibes_tus_ganancias_promocion_ganancia_referir',
                'recibes_tus_ganancias_promocion_turbo',
                'recibes_tus_ganancias_extra_gratificacion_usuario',
                'recibes_tus_ganancias_impuesto_servicio',
                'recibes_tus_ganancias_retencion_iva',
                'recibes_tus_ganancias_retencion_isr',
                'recibes_tus_ganancias_otras_ganancias_ajuste',
                'recibes_tus_ganancias_impuestos',
                'recibes_tus_ganancias_otras_tarifas_ajuste',
                'recibes_tus_ganancias_impuestos_retencion',
            ];
        @endphp

        @foreach ($resultados as $mes => $datosMesGrupoDos)
            @php
                $totalMesGrupoDos = 0;
            @endphp

            @foreach ($columnasGrupoDos as $columnaGrupoDos)
                @php
                    $totalMesGrupoDos += $datosMesGrupoDos[$columnaGrupoDos] ?? 0;
                @endphp
            @endforeach

            <td>{{ '$' . number_format($totalMesGrupoDos, 2, '.', ',') }}</td>
        @endforeach
            <td></td>
        </tr>


        <tr class="cell-1 collapsed" data-toggle="collapse" data-target="#recibesSaldo">
            <th scope="row">
                <button type="button" class="btn btn-link p-0" onclick="toggleIconPosition(this)">
                    <i class=" fas fa-caret-right fa-fw"></i>
                </button>Recibes: Saldo de viajes: Pagos: Se transfirió a la cuenta bancaria
            </th>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format(abs($resultados[$i]['recibes_saldo_viajes_pagos_transferencia_bancaria'] ?? null), 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>

        </tr>
        <tr id="recibesSaldo" class="cell-1 row-child collapse">
            <td scope="row">Recibes:Ajustes posteriores al viaje</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_ajustes_posteriores_viaje'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes : Saldo de viajes : Pagos : Efectivo recibido</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_pagos_efectivo'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Saldo de viajes:Impuestos:IVA sobre la tasa de
                servicio</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_impuestos_iva_servicio'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Saldo de viajes:Impuesto:IVA sobre
                tarifas/contribuciones</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_iva_tarifas_contribuciones'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>

        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Saldo de viajes:Reembolsos:Depósito de validación de
                cuenta</td>
                @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>

        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Saldo de viajes:Gastos:Peaje</td>
            @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_gastos_peaje'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes:Saldo de viajes:Reembolsos:Peaje</td>
            @for ($i = 1; $i <= 12; $i++)
                <td>{{ '$' . number_format($resultados[$i]['recibes_saldo_viajes_reembolsos_peaje'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
            @endfor
            <td></td>
        </tr>
        <tr id="recibesSaldo" class="collapse cell-1 row-child">
            <td scope="row" class="text-wrap text-sm">Recibes</td>
            @for ($i = 1; $i <= 12; $i++)
            <td>{{ '$' . number_format($resultados[$i]['recibes'] ?? null, 2, '.', ',') ?? 'Sin datos' }}</td>
        @endfor
            <td></td>
        </tr>
        <tr class="cell-1 table-active" data-toggle="collapse" data-target="#demo-4">
            <td scope="row" class="text-wrap font-weight-bold" style="text-align: right;">Total:</td>
            @php

    $columnasGrupoTres = [
        'recibes_tus_ganancias',
        'recibes_ajustes_posteriores_viaje',
        'recibes_saldo_viajes_pagos_efectivo',
        'recibes_saldo_viajes_impuestos_iva_servicio',
        'recibes_saldo_viajes_iva_tarifas_contribuciones',
        'recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta',
        'recibes_saldo_viajes_gastos_peaje',
        'recibes_saldo_viajes_reembolsos_peaje',
        'recibes',
    ];
@endphp

@foreach ($resultados as $mes => $datosMesGrupoTres)
    @php
        $totalMesGrupoTres = 0;
    @endphp

    @foreach ($columnasGrupoTres as $columnaGrupoTres)
        @php
            // Si es la columna "recibes", restamos su valor en lugar de sumarlo
            if ($columnaGrupoTres === 'recibes') {
                $totalMesGrupoTres -= $datosMesGrupoTres[$columnaGrupoTres] ?? 0;
            } else {
                $totalMesGrupoTres += $datosMesGrupoTres[$columnaGrupoTres] ?? 0;
            }
        @endphp
    @endforeach

    <td>{{ '$' . number_format(abs($totalMesGrupoTres), 2, '.', ',') }}</td>
@endforeach

            <td></td>
            <td></td>
        </tr>
    </tbody>

</table>
