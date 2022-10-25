
@extends('layouts.master')

@section('content')

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>

    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Ajouter un nouveau évenement</b></div>
            </div>
        </div>
        <div class="card-body">
            <form  action="{{ route('events.store') }}" method="post" >
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form" for="nomEvent">Nom :</label>
                    <div class="col-sm-5">
                        <input type="text" name="nomEvent" class="form-control" id="nomEvent" style="border: solid 1px cornflowerblue "/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form" for="lieuEvent">Lieu :</label>
                    <div class="col-sm-5">
                        <input type="text" name="lieuEvent" class="form-control" id="lieuEvent" style="border: solid 1px cornflowerblue "/>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form" for="typeEvent">Type :</label>
                    <div class="col-sm-5">
                        <select name="typeEvent" class="form-control form-select" id="typeEvent" style="border: solid 1px cornflowerblue ">
                            <option value="Course">Course</option>
                            <option value="Exposition">Exposition</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form" for="nbrParticipants">Nombre Participant :</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="number" name="nbrParticipants" id="nbrParticipants" style="border: solid 1px cornflowerblue " />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form" for="dateEvent">Date d'ouverture :</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="dateEvent" id="dateEvent" style="border: solid 1px cornflowerblue "/>
                    </div>
                </div>
                <div style="margin-left: 25%">
                    <input type="submit" class="btn btn-primary" value="Ajouter" />
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>

@endsection('content')
