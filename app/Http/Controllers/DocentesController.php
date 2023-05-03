<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;
use Google\Client;


class DocentesController extends Controller
{


    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('docentes.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docentes.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
         $request->validate([
            'rfc'=>'required|uinique:docentes|max:18',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50',
            'nombre'=>'require|max:50']);
      }

    /**
     * Display the specified resource.
     */
    public function show(Docentes $docentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docentes $docentes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docentes $docentes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docentes $docentes)
    {
        //
    }
}
