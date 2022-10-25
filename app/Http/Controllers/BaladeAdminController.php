<?php

namespace App\Http\Controllers;

use App\Models\Balade;
use Illuminate\Http\Request;

class BaladeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balades = Balade::all();
        return view ('baladesadmin.index')->with('balades', $balades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baladesadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Balade::create($input);
        return redirect('baladesadmin')->with('flash_message', 'Balade has been added!');
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
        return view('baladesadmin.show')->with('balades', $balade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $balade = Balade::find($id);
        return view('baladesadmin.edit')->with('balades', $balade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $balade = Balade::find($id);
        $input = $request->all();
        $balade->update($input);
        return redirect('baladesadmin')->with('flash_message', 'Balade has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balade  $balade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balade = Balade::find($id);
        $balade->delete();
        return redirect('baladesadmin')->with('flash_message', 'Balade has been deleted!');
    }
}
