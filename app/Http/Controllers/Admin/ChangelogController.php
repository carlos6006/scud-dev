<?php

namespace App\Http\Controllers\Admin;

use App\Models\Changelog;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class ChangelogController
 * @package App\Http\Controllers\Admin
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
    $latestVersion = Changelog::max('version');

    return view('admin.changelog.index', compact('changelog', 'types', 'category', 'changelogs','latestVersion'))
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
        return view('changelog.index', compact('changelog', 'types','category'));
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

        return redirect()->route('changelogs.index')
            ->with('success', 'Changelog created successfully.');
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

        return view('changelog.show', compact('changelog'));
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

        return view('changelog.edit', compact('changelog'));
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

        $changelog->update($request->all());

        return redirect()->route('changelogs.index')
            ->with('success', 'Changelog updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $changelog = Changelog::find($id)->delete();

        return redirect()->route('changelogs.index')
            ->with('success', 'Changelog deleted successfully');
    }
}
