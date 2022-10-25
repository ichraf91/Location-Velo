<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Participation;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ParticipationController extends Controller
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
//        $userId= 1;
        $data = Participation::all();
        $events = [];
        foreach ($data as $eventP){
            if ($eventP->userId == $userId){
                $event = Events::find($eventP->eventId);
                $events[] = $event;
            }
        }
        return view('participations.index', compact('data','userId','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'eventId'          =>  'required',
            'userId'          =>  'required',
        ]);


        $participation = new Participation();

        $participation->eventId = $request->eventId;
        $participation->userId = $request->userId;

        $event = Events::find($request->eventId);
        $event->nbrParticipants = $event->nbrParticipants - 1 ;

        $event->save();
        $participation->save();

        return redirect()->route('participations.index')->with('success', 'Participation ajouté avec succés.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        //
        $this->getUserEvents();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function edit(Participation $participation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participation $participation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        //
    }

    public function generatePDF(Request $request)
    {
        $event = Events::find($request->eventId);
        $user = User::find($request->userId);
        $date = date('Y/m/d');

        $pdf = PDF::loadView('participations.myPDF', compact('event','date','user'));
        return $pdf->download('participation '. $event->nomEvent . '.pdf');
    }

    public function getUserEvents() {
        $user = Auth::user();
        return $user->events();
    }
}
