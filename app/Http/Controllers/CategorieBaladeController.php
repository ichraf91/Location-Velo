<?php

namespace App\Http\Controllers;

use App\Models\CategorieBalade;
use App\Models\Balade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieBaladeController extends Controller
{

      //function to see if the user is logged in
      public function __construct()
      {
          $this->middleware('auth');
      }

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

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:posts|max:255',
            'price' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $input = $request->all();
            $catbalade = CategorieBalade::create($input);
            return redirect()->route('catBalade.index')->with('success', 'Catégorie de balade ajoutée avec succès');

        }
        
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
        if (isset($catbalade)) {
            return view('catBalade.show')->with('catbalade', $catbalade);
        }else{
            return redirect()->route('catBalade.index')->with('error', 'Catégorie de balade introuvable');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategorieBalade  $categorieBalade
     * @return \Illuminate\Http\Response
     */
    public function findBaladesbyCategorieBaladeId($id)
    {
        $catbalade = CategorieBalade::find($id);
        if (isset($catbalade)) {
        //retrieve all balades where CategorieBalade_id = id and where status = Started
            $balades = Balade::where('CategorieBalade_id', $id)->where('status', 'Started')->order_by('price')->get();
            return view('baladesclient.index')->with('balades', $balades);
        }else{
            return redirect()->route('catBalade.index')->with('error', 'Catégorie de balade vide');
        }
        
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
        if (isset($catbalade)) {
            return view('catBalade.edit')->with('catbalade', $catbalade);
        }else{
            return redirect()->route('catBalade.index')->with('error', 'Catégorie de balade introuvable');
        }
       
        
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
        if (isset($catbalade)) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:posts|max:255',
                'price' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }else{
                $input = $request->all();
                $catbalade->update($input);
                return redirect()->route('catBalade.index')->with('success', 'Catégorie de balade modifiée avec succès');
    
            }
        }else{
            return redirect()->route('catBalade.index')->with('error', 'Catégorie de balade introuvable');
        }
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
        if (isset($catbalade)) {
            return redirect()->route('catBalade.index')->with('success', 'Catégorie de balade supprimée avec succès');
        }else{
            return redirect()->route('catBalade.index')->with('error', 'Catégorie de balade introuvable');
        }
    }
}
