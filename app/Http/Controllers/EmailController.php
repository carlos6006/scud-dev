<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

/**
 * Class EmailController
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::paginate();

        return view('email.index', compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * $emails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email = new Email();
        return view('email.create', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Email::$rules);

        $email = Email::create($request->all());

        return redirect()->route('emails.index')
            ->with('success', 'Email created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::find($id);

        return view('email.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::find($id);

        return view('email.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Email $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        request()->validate(Email::$rules);

        $email->update($request->all());

        return redirect()->route('emails.index')
            ->with('success', 'Email updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $email = Email::find($id)->delete();

        return redirect()->route('emails.index')
            ->with('success', 'Email deleted successfully');
    }
}
