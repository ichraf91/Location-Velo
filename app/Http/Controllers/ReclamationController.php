<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\CategorieReclamation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $user = Auth::user();
        $userId = $user->id;
        $data = Reclamation::latest()->paginate(5);
    
        
        return view('reclamation.index', compact('data','userId'))->with('i', (request()->input('page', 1) - 1) * 5);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = CategorieReclamation::all();
      

        return view('reclamation.create', compact('cat'));
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
            'titre'          =>  ['required', 'min:5', 'max:30'],
            'description'          =>  ['required', 'min:10', 'max:300'],
            'categorie_id'         =>  'required',    
        ]);


        $rec = new Reclamation();

        $rec->titre = $request->titre;
        $rec->description = $request->description;
        $rec->categorie_id = $request->categorie_id;
        $rec->status = "Pending";
        $user = Auth::user();
        $rec->user_id = $user->id;
//        $event->userId = 1;
        $rec->save();
        return redirect()->route('reclamation.index')->with('success', 'Reclamation ' . $rec->titre . ' ajouté avec succés.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamation $reclamation)
    {
        $user = Auth::user();
        $userId = $user->id;
//        $userId = 1;
        return view('reclamation.show',compact('reclamation','userId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        $cat = CategorieReclamation::all();
        return view('reclamation.edit', compact('reclamation','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        $request->validate([
            'titre'          =>  ['required', 'min:5', 'max:30'],
            'description'          =>  ['required', 'min:10', 'max:300'],
            'user_id'          =>  'required',
            'categorie_id'         =>  'required',
            'status'         =>  'required',
        ]);


        $rec = Reclamation::find($request->hidden_id);

        $rec->titre = $request->titre;
        $rec->description = $request->description;
        $rec->categorie_id = $request->categorie_id;
        $rec->status = $request->status;
        $rec->save();

        return redirect()->route('reclamation.index')->with('success', 'Reclamation ' . $rec->titre . ' modifié avec succés.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();

        return redirect()->route('reclamation.index')->with('success', 'Reclamation ' . $reclamation->titre . ' supprimé avec succés.');
    
    }
}
