<?php

namespace App\Http\Controllers;
use DateTime;

use App\Models\Command;
use App\Models\Bike;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreCommandRequest;
use App\Http\Requests\UpdateCommandRequest;
use App\Http\Requests\UpdateBikeRequest;
use App\Http\Requests\StoreBikeRequest;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('commands.index')->with(['commands' => Command::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    return view('commands.create')->withBike(Bike::findOrFail($id));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandRequest $request)
   {
                  $this->validate($request
                  ,[

                   'dateL' => 'required',
                   'dateR' => 'required'
                   ]);
                   $bike = Bike::findOrFail($request->bike_id);
                   $dateLocation = new DateTime($request->dateL);
                   $dateRetour = new DateTime($request->dateR);
                   $jours = date_diff($dateLocation,$dateRetour);
                   $prixTtc = $bike->prixJ* $jours->format('%d');

           Command::create([
            'user-id' =>auth()->user()->id,
           'bike-id' =>$request->bike_id,
           'dateL' =>$request->dateL,
           'dateR' =>$request->dateR,
           'prixTTC' =>$prixTtc,
           ]);
           $bike->update([
           'dispo'=> 0
           ]);
         return redirect()->route('bikes.index')->with([
           'success' => 'Commande ajoutée']);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        //
                return view('commands.show')->withCommand($command);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit(Command $command)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandRequest  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandRequest $request, Command $command)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        //
    }
}
