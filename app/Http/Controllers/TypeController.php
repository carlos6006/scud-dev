<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class TypeController
 * @package App\Http\Controllers
 */
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate();
        $tableSize = Type::getTableSize();

        return view('admin.type.index', compact('types','tableSize'))
            ->with('i', (request()->input('page', 1) - 1) * $types->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = new Type();
        return view('type.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Type::$rules);

        $type = Type::create($request->all());

        return redirect()->route('types.index')
            ->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);

        return view('type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);

        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        request()->validate(Type::$rules);

        $type->update($request->all());

        return redirect()->route('types.index')
            ->with('success', 'Type updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $type = Type::find($id)->delete();

        return redirect()->route('types.index')
            ->with('success', 'Type deleted successfully');
    }
}
