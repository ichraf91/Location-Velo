
@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Détail de l'évenement {{$event->nomEvent}}</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm float-end">Retour à la liste</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Nom :</b></label>
                <div class="col-sm-10">
                    {{ $event->nomEvent }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Lieu :</b></label>
                <div class="col-sm-10">
                    {{ $event->lieuEvent }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Type :</b></label>
                <div class="col-sm-10">
                    {{ $event->typeEvent }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Nombre Participant :</b></label>
                <div class="col-sm-10">
                    {{ $event->nbrParticipants }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Date d'ouverture :</b></label>
                <div class="col-sm-10">
                    {{ $event->dateEvent }}
                </div>
            </div>
            @if($event->userId != $userId && $event->nbrParticipants > 0)
            <div style="margin-left: 25%">
                    <form  action="{{ route('participations.store') }}" method="post" >
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <input type="hidden" name="eventId" class="form-control" id="eventId" value="{{ $event->id }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <input type="hidden" name="userId" class="form-control" id="userId" value="{{ $userId }}"/>
                            </div>
                        </div>
                        <div style="margin-left: 25%">
                            <input type="submit" class="btn btn-success" value="Participer à cet événement" />
                        </div>
                    </form>
            </div>
            @elseif($event->userId != $userId && $event->nbrParticipants == 0)
                    <div>
                        <br>
                        <img src="{{ asset('img/warning.png') }}" alt="" style="width: 5%">
                        <span style="font-size: 18px; color: darkred; font-weight: bold; text-decoration: underline ">Cet événement est complet</span>
                    </div>
            @endif


        </div>
    </div>

@endsection('content')
