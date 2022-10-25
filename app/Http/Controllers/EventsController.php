<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $user = Auth::user();
        $userId = $user->id;
        $data = Events::latest()->paginate(5);
        return view('events.index', compact('data','userId'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nomEvent'          =>  'required',
            'typeEvent'          =>  'required',
            'dateEvent'          =>  ['required', 'after_or_equal:' .  Carbon::now()->addDays(3)],
            'lieuEvent'         =>  'required',
            'nbrParticipants'         =>  ['required', 'gt:5'],
        ]);


        $event = new Events();

        $event->nomEvent = $request->nomEvent;
        $event->typeEvent = $request->typeEvent;
        $event->dateEvent = $request->dateEvent;
        $event->lieuEvent = $request->lieuEvent;
        $event->nbrParticipants = $request->nbrParticipants;
        $user = Auth::user();
        $event->userId = $user->id;
//        $event->userId = 1;
        $event->save();
        return redirect()->route('events.index')->with('success', 'Évenement ' . $event->nomEvent . ' ajouté avec succés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return Response
     */
    public function show(Events $event)
    {
        $user = Auth::user();
        $userId = $user->id;
//        $userId = 1;
        return view('events.show',compact('event','userId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return Response
     */
    public function edit(Events $event)
    {
        //
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return Response
     */
    public function update(Request $request, Events $event)
    {
        //
        $request->validate([
            'nomEvent'          =>  'required',
            'typeEvent'          =>  'required',
            'dateEvent'          =>  ['required', 'after_or_equal:' .  Carbon::now()->addDays(3)],
            'lieuEvent'         =>  'required',
            'nbrParticipants'         =>  ['required', 'gt:5'],
        ]);


        $event = Events::find($request->hidden_id);

        $event->nomEvent = $request->nomEvent;

        $event->typeEvent = $request->typeEvent;

        $event->dateEvent = $request->dateEvent;

        $event->lieuEvent = $request->lieuEvent;

        $event->nbrParticipants = $request->nbrParticipants;


        $event->save();

        return redirect()->route('events.index')->with('success', 'Évenement ' . $event->nomEvent . ' modifié avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return Response
     */
    public function destroy(Events $event)
    {
        //
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Évenement ' . $event->nomEvent . ' supprimé avec succés.');
    }
}
