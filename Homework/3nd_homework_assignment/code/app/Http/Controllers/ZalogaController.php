<?php

namespace App\Http\Controllers;

use App\Zaloga;
use Illuminate\Http\Request;

class ZalogaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $zaloga = Zaloga::orderBy('Ime', 'asc')->get();
        return view('zaloga.index', compact('zaloga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zaloga.create');
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
            'Ime' => 'required|string|max:255',
            'Kolicina' => 'required|int'
        ]);

        $zaloga = new Zaloga();
        $zaloga->Ime = $request->input('Ime');
        $zaloga->Kolicina = $request->input('Kolicina');
        $zaloga->save();

        return redirect('/zaloga')->with('success', 'Dodan vnos v zalogo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zaloga = Zaloga::find($id);
        return view('zaloga.show')->with('zaloga', $zaloga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zaloga = Zaloga::find($id);

        //Check if zaloga exists before deleting
        if (!isset($zaloga)) {
            return redirect('/zaloga')->with('error', 'Vnos v zalogi ni najden');
        }

        return view('zaloga.edit')->with('zaloga', $zaloga);
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
            'Ime' => 'required|string|max:255',
            'Kolicina' => 'required|int',
            'Id_dobava' => 'int'
        ]);

        $zaloga = Zaloga::find($id);
        $zaloga->Ime = $request->input('Ime');
        $zaloga->Kolicina = $request->input('Kolicina');
        $zaloga->Id_dobava = $request->input('Id_dobava');
        $zaloga->save();

        return redirect('/zaloga')->with('success', 'Zaloga posodobljena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zaloga = Zaloga::find($id);

        //Check if zaloga exists before deleting
        if (!isset($zaloga)) {
            return redirect('/zaloga')->with('error', 'Vnos v zalog ni najden');
        }

        $zaloga->delete();
        return redirect('/zaloga')->with('success', 'Vnos izbrisan iz zaloge');
    }
    
}
