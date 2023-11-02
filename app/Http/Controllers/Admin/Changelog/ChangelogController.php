<?php

namespace App\Http\Controllers\Admin\Changelog;

use App\Models\Changelog;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


/**
 * Class ChangelogController
 * @package App\Http\Controllers\Admin\Changelog
 */
class ChangelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $changelog = new Changelog();
    $types = Type::pluck('nombre', 'id');
    $category = Category::pluck('nombre', 'id');
    $changelogs = Changelog::paginate();
    $tableSize = Changelog::getTableSize();
    return view('admin.changelog.index', compact('changelog', 'types', 'category', 'changelogs'))
        ->with('tableSize', $tableSize);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $changelog = new Changelog();
        $types = Type::pluck('nombre', 'id');
        $category = Category::pluck('nombre', 'id');
        $latestVersion = Changelog::max('version');
        return view('admin.changelog.create', compact('changelog', 'types','category','latestVersion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Changelog::$rules);

        $changelog = Changelog::create($request->all());

        if ($changelog) {
            Alert::success('¡Éxito!', 'El registro ha sido creado exitosamente.')->flash();
        } else {
            Alert::error('¡Error!', 'No se pudo crear el registro.')->flash();
        }

        return redirect()->route('admin.changelogs.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $changelog = Changelog::find($id);

        return view('admin.changelog.show', compact('changelog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $changelog = Changelog::find($id);
        $types = Type::pluck('nombre', 'id');
        $category = Category::pluck('nombre', 'id');
        $latestVersion = Changelog::max('version');

        return view('admin.changelog.edit', compact('changelog', 'types','category','latestVersion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Changelog $changelog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Changelog $changelog)
{
    request()->validate(Changelog::$rules);

    if ($changelog->update($request->all())) {
        Alert::success('¡Éxito!', 'El registro ha sido actualizado exitosamente.')->flash();
    } else {
        Alert::error('¡Error!', 'No se pudo actualizar el registro.')->flash();
    }

    return redirect()->route('admin.changelogs.index');
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $changelog = Changelog::find($id);

        if ($changelog) {
            $changelog->delete();
            Alert::success('¡Éxito!', 'El registro ha sido eliminado exitosamente.')->flash();
        } else {
            Alert::error('¡Error!', 'No se pudo eliminar el registro.')->flash();
        }

        return redirect()->route('admin.changelogs.index');
    }

}
