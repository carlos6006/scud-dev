<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaxRegime;
use Illuminate\Http\Request;

/**
 * Class TaxRegimeController
 * @package App\Http\Controllers
 */
class TaxRegimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxRegimes = TaxRegime::paginate();
        $tableSize = TaxRegime::getTableSize();

        return view('tax-regime.index', compact('taxRegimes','tableSize'))
            ->with('i', (request()->input('page', 1) - 1) * $taxRegimes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxRegime = new TaxRegime();
        return view('tax-regime.create', compact('taxRegime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TaxRegime::$rules);

        $taxRegime = TaxRegime::create($request->all());

        return redirect()->route('tax-regimes.index')
            ->with('success', 'TaxRegime created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxRegime = TaxRegime::find($id);

        return view('tax-regime.show', compact('taxRegime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxRegime = TaxRegime::find($id);

        return view('tax-regime.edit', compact('taxRegime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TaxRegime $taxRegime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxRegime $taxRegime)
    {
        request()->validate(TaxRegime::$rules);

        $taxRegime->update($request->all());

        return redirect()->route('tax-regimes.index')
            ->with('success', 'TaxRegime updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $taxRegime = TaxRegime::find($id)->delete();

        return redirect()->route('tax-regimes.index')
            ->with('success', 'TaxRegime deleted successfully');
    }
}
