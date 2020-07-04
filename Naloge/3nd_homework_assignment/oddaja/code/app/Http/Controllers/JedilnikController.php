<?php

namespace App\Http\Controllers;

use App\Jedilnik;
use Illuminate\Http\Request;
use DB;

class JedilnikController extends Controller
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
        //
        $jedilnik = Jedilnik::orderBy('Vrsta', 'asc')->get();
        return view('jedilnik.index', compact('jedilnik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jedilnik.create');

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
            'Cena' => 'required|numeric|between:0,99.99',
            'Vrsta' => 'string|max:255'
        ]);

        $jedilnik = new Jedilnik;
        $jedilnik->Ime = $request->input('Ime');
        $jedilnik->Cena = $request->input('Cena');
        $jedilnik->Vrsta = $request->input('Vrsta');
        $jedilnik->save();

        return redirect('/jedilnik')->with('success', 'Vnos v jedilnik vpisan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jedilnik = Jedilnik::find($id);
        return view('jedilnik.show')->with('jedilnik', $jedilnik);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jedilnik = Jedilnik::find($id);

        //Check if jedilnik exists before deleting
        if (!isset($jedilnik)) {
        return redirect('/jedilnik')->with('error', 'Vnos v jedilniku ni najden');
        }

        return view('jedilnik.edit')->with('jedilnik', $jedilnik);
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
        'Cena' => 'required|numeric|between:0,99.99',
        'Vrsta' => 'string|max:255'
        ]);

        $jedilnik = Jedilnik::find($id);
        $jedilnik->Ime = $request->input('Ime');
        $jedilnik->Cena = $request->input('Cena');
        $jedilnik->Vrsta = $request->input('Vrsta');
        $jedilnik->save();

        return redirect('/jedilnik')->with('success', 'Jedilnik posodobljen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jedilnik = Jedilnik::find($id);

        //Check if jedilnik exists before deleting
        if (!isset($jedilnik)) {
        return redirect('/jedilnik')->with('error', 'Vnos v jedilniku ni najden');
        }

        $jedilnik->delete();
        return redirect('/jedilnik')->with('success', 'Vnos izbrisan iz jedilnika');
    }
}
