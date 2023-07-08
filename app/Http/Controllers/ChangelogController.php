<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ChangelogController
 * @package App\Http\Controllers
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
        $changelogs = Changelog::paginate();
        $tableSize = Changelog::getTableSize();

       // return view('changelog.index', compact('changelogs'))->with('i', (request()->input('page', 1) - 1) * $changelogs->perPage());
       return view('changelog.index', ['changelogs' => $changelogs])
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
        return view('changelog.create', compact('changelog'));
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
