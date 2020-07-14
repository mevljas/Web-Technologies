<?php

namespace App\Http\Controllers;

use App\Narocilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class NarocilaController extends Controller
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
    public function index(Request $request)
    {
        if ($request->isMethod('PUT') && !is_null($request->input('Filter'))) {
            $narocila = Narocilo::join('Jedilnik', 'Narocilo.Id_Jedilnik', '=',
            'Jedilnik.Id_Jedilnik')->join('users', 'Narocilo.Id_Natakar', '=',
            'users.id')->join('Stranka', 'Narocilo.Id_Stranka', '=',
            'Stranka.Id_Stranka')->where('Jedilnik.Ime', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('Stranka.Ime', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('Stranka.Priimek', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('Narocilo.Skupina', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('Narocilo.Kolicina', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('Narocilo.Namen', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('users.name', 'like', '%' .
            $request->input('Filter') . '%')->orwhere('users.surname', 'like', '%' .
            $request->input('Filter') . '%')->orderBy('Narocilo.Datum', 'desc')->get();

            return view('narocila.index', compact('narocila'));
        } 
        else{
            $narocila = Narocilo::orderBy('Datum', 'desc')->get();
            return view('narocila.index', compact('narocila'));
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('narocila.create');
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
            'Id_Jedilnik' => 'required|int',
            'Kolicina' => 'int',
            'Skupina' => 'max:255',
            'Namen' => 'max:255'
        ]);


        // Create Narocilo
        $narocilo = new Narocilo;
        $narocilo->Id_Miza = $request->input('Id_Miza');
        $narocilo->Skupina = $request->input('Skupina');
        $narocilo->Kolicina = $request->input('Kolicina');
        $narocilo->Namen = $request->input('Namen');
        $narocilo->Datum = $request->input('Datum');
        $narocilo->Id_Natakar = auth()->user()->id;
        $narocilo->Id_Jedilnik = $request->input('Id_Jedilnik');
        $narocilo->Id_Stranka = $request->input('Id_Stranka');
        $narocilo->save();

        return redirect('/narocila')->with('success', 'Naročilo ustvarjeno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $narocilo = Narocilo::find($id);
        return view('narocila.show')->with('narocilo', $narocilo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $narocilo = Narocilo::find($id);

        //Check if narocilo exists before deleting
        if (!isset($narocilo)) {
            return redirect('/narocila')->with('error', 'Naročilo ni najdeno');
        }

        // Check for correct user
        if (auth()->user()->id !== $narocilo->Id_Natakar) {
            return redirect('/narocila')->with('error', 'Unauthorized Page');
        }

        return view('narocila.edit')->with('narocilo', $narocilo);
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
        'Id_Jedilnik' => 'required|int',
        'Kolicina' => 'int',
        ]);
        
        $narocilo = Narocilo::find($id);
        $narocilo->Id_Miza = $request->input('Id_Miza');
        $narocilo->Skupina = $request->input('Skupina');
        $narocilo->Kolicina = $request->input('Kolicina');
        $narocilo->Namen = $request->input('Namen');
        $narocilo->Datum = $request->input('Datum');
        $narocilo->Id_Natakar = auth()->user()->id;
        $narocilo->Id_Jedilnik = $request->input('Id_Jedilnik');
        $narocilo->Id_Stranka = $request->input('Id_Stranka');
        $narocilo->save();
        return redirect('/narocila')->with('success', 'Naročilo posodobljeno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $narocilo = Narocilo::find($id);

        //Check if narocilo exists before deleting
        if (!isset($narocilo)) {
            return redirect('/narocila')->with('error', 'Naročilo ni najdeno');
        }

        // Check for correct user
        if (auth()->user()->id !== $narocilo->Id_Natakar) {
            return redirect('/narocila')->with('error', 'Unauthorized Page');
        }

        $narocilo->delete();
        return redirect('/narocila')->with('success', 'Naročilo izbrisano');
    }
}
