<?php

namespace App\Http\Controllers;

use App\Models\CategorieBalade;
use Illuminate\Http\Request;

class CategorieBaladeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catbalades = CategorieBalade::all();
        return view ('catBalade.index')->with('balades', $catbalades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catBalade.create');
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
        CategorieBalade::create($input);
        return redirect('catBalade')->with('flash_message', 'Categorie Balade has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieBalade  $categorieBalade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catbalade = CategorieBalade::find($id);
        return view('baladesclient.show')->with('balades', $catbalade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieBalade  $categorieBalade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catbalade = CategorieBalade::find($id);
        return view('catbalade.edit')->with('catbalade', $catbalade);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieBalade  $categorieBalade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catbalade = CategorieBalade::find($id);
        $input = $request->all();
        $catbalade->update($input);
        return redirect('/catbalade')->with('flash_message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieBalade  $categorieBalade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategorieBalade::destroy($id);
        return redirect('/catbalade')->with('flash_message', 'deleted!');
    }
}
