<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dobava;
use App\Zaloga;
use DB;

class DobavaController extends Controller
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
        $dobava = Dobava::orderBy('DatumDobave', 'desc')->get();
        return view('dobava.index', compact('dobava'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dobava.create');
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
            'Kolicina' => 'required|int|between:1,100',
            'DatumDobave' => 'date'
        ]);

        $dobava = new Dobava;
        $dobava->Kolicina = $request->input('Kolicina');
        $dobava->DatumDobave = $request->input('DatumDobave');
        $dobava->Id_Dobavitelj = $request->input('Id_Dobavitelj');
        $dobava->save();
        DB::table('Zaloga')->where('Id_Zaloga', $request->input('Id_Zaloga')) ->limit(1)->update(array('Id_Dobava' => $dobava->Id_Dobava)); 
        return redirect('/dobava')->with('success', 'Vnos v dobavo vpisan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dobava = Dobava::find($id);
        return view('dobava.show')->with('dobava', $dobava);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dobava = Dobava::find($id);

        //Check if dobava exists before deleting
        if (!isset($dobava)) {
            return redirect('/dobava')->with('error', 'Vnos v dobavi ni najden');
        }

        return view('dobava.edit')->with('dobava', $dobava);
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
            'Kolicina' => 'required|int|between:1,100',
            'DatumDobave' => 'date'
        ]);

        $dobava = Dobava::find($id);
        $dobava->Kolicina = $request->input('Kolicina');
        $dobava->DatumDobave = $request->input('DatumDobave');
        $dobava->Id_Dobavitelj = $request->input('Id_Dobavitelj');
        $dobava->save();
        DB::table('Zaloga')->where('Id_Zaloga', $dobava->zaloga()->pluck('Id_Zaloga')->implode('-'))->limit(1)->update(array('Id_Dobava' => NULL));
        DB::table('Zaloga')->where('Id_Zaloga', $request->input('Id_Zaloga'))->limit(1)->update(array('Id_Dobava' => $dobava->Id_Dobava));
        return redirect('/dobava')->with('success', 'Dobava posodobljena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dobava = Dobava::find($id);

        //Check if dobava exists before deleting
        if (!isset($dobava)) {
            return redirect('/dobava')->with('error', 'Vnos v dobavi ni najden');
        }

        DB::table('Zaloga')->where('Id_Zaloga',
        $dobava->zaloga()->pluck('Id_Zaloga')->implode('-'))->limit(1)->update(array('Id_Dobava' => NULL));
        $dobava->delete();
        return redirect('/dobava')->with('success', 'Vnos izbrisan iz dobave');
    }
}
