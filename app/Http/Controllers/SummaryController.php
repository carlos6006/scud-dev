<?php

namespace App\Http\Controllers;
use App\Models\ImportPaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SumPayments;



class SummaryController extends Controller
{
    public function index()
    {
    $users_id =auth()->id();
    $anio=date('Y');

    $resultados = SumPayments::obtenerDatosPorMes($users_id,$anio);

    return view('summary.index', compact('resultados'));
    }
}
