<?php

namespace App\Http\Controllers;

use App\Dobavitelj;
use Illuminate\Http\Request;

class DobaviteljController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dobavitelj = Dobavitelj::orderBy('Ime', 'asc')->get();
        return view('dobavitelj.index', compact('dobavitelj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dobavitelj.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Ime' => 'required|string|max:255'
        ]);

        $dobavitelj = new Dobavitelj;
        $dobavitelj->Ime = $request->input('Ime');
        $dobavitelj->save();

        return redirect('/dobavitelj')->with('success', 'Dobavitelj dodan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dobavitelj = Dobavitelj::find($id);
        return view('dobavitelj.show')->with('dobavitelj', $dobavitelj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dobavitelj = Dobavitelj::find($id);

        //Check if dobavitelj exists before deleting
        if (!isset($dobavitelj)) {
            return redirect('/dobavitelj')->with('error', 'Vnos v jedilniku ni najden');
        }

        return view('dobavitelj.edit')->with('dobavitelj', $dobavitelj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Ime' => 'required|string|max:255'
        ]);

        $dobavitelj = Dobavitelj::find($id);
        $dobavitelj->Ime = $request->input('Ime');
        $dobavitelj->save();

        return redirect('/dobavitelj')->with('success', 'Dobavitelj posodobljen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dobavitelj = Dobavitelj::find($id);

        //Check if dobavitelj exists before deleting
        if (!isset($dobavitelj)) {
            return redirect('/dobavitelj')->with('error', 'Dobavitelj ni najden');
        }

        $dobavitelj->delete();
        return redirect('/dobavitelj')->with('success', 'Dobavitelj izbrisan');
    }
}
