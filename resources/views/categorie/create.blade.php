
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
                <div class="col col-md-6"><b>Ajouter un nouveau categorie</b></div>
            </div>
        </div>
        <div class="card-body">
            <form  action="{{ route('categorie.store') }}" method="post" >
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form" for="nomEvent">Nom :</label>
                    <div class="col-sm-5">
                        <input type="text" name="nom" class="form-control" id="nom" style="border: solid 1px cornflowerblue "/>
                    </div>
                </div>
                <div style="margin-left: 25%">
                    <input type="submit" class="btn btn-primary" value="Ajouter" />
                    <a href="{{ route('categorie.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>

@endsection('content')
