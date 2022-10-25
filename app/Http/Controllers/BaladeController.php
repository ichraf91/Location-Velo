<?php

namespace App\Http\Controllers;

use App\Models\Balade;
use Illuminate\Http\Request;

class BaladeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balades = Balade::all();
        return view ('baladesclient.index')->with('balades', $balades);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $balade = Balade::find($id);
        return view('baladesclient.show')->with('balades', $balade);
    }

}
