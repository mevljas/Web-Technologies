<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Dobrodošli na spletni strani restavracije!';
        return view('pages.index')->with('title', $title);
    }

}
