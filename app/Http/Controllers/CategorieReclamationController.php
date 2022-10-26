<?php

namespace App\Http\Controllers;
use App\Models\CategorieReclamation;
use Illuminate\Http\Request;

class CategorieReclamationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategorieReclamation::latest()->paginate(5);
        return view('categorie.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'          =>  'required',  
        ]);
        $categorie = new CategorieReclamation();
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->route('categorie.index')->with('success', 'Categorie ' . $categorie->nom . ' ajouté avec succés.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieReclamation  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieReclamation $categorie)
    {
        //
        return view('categorie.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieReclamation  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieReclamation $categorie)
    {
        //
        
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieReclamation  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieReclamation $categorie)
    {
        $request->validate([
            'nom'          =>  'required',  
        ]);
        $categorie = CategorieReclamation::find($request->hidden_id);
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->route('categorie.index')->with('success', 'Categorie ' . $categorie->nom . ' modifier avec succés.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieReclamation  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieReclamation $categorie)
    {
        $categorie->delete();

        return redirect()->route('categorie.index')->with('success', 'Categorie ' . $categorie->nom . ' supprimé avec succés.');
 
    }
}
