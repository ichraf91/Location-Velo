
@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Détail de categorie {{$categorie->nom}}</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('categorie.index') }}" class="btn btn-primary btn-sm float-end">Retour à la liste</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Nom :</b></label>
                <div class="col-sm-10">
                    {{ $categorie->nom }}
                </div>
            </div>



        </div>
    </div>

@endsection('content')
