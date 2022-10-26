
@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Détail de reclamation {{$reclamation->nom}}</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('reclamation.index') }}" class="btn btn-primary btn-sm float-end">Retour à la liste</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Nom :</b></label>
                <div class="col-sm-10">
                    {{ $reclamation->titre }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Description :</b></label>
                <div class="col-sm-10">
                    {{ $reclamation->description }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Categorie :</b></label>
                <div class="col-sm-10">
                    {{ $reclamation->categorie->nom }}
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Status :</b></label>
                <div class="col-sm-10">
                    {{ $reclamation->status }}
                </div>
            </div>

            



        </div>
    </div>

@endsection('content')
