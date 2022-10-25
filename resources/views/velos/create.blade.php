@extends('velos.layout')

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <header class="card-header">

        </header>
        <div class="card-content">
            <div class="content">
<form method="post" action="{{ route('velos.store') }}" enctype="multipart/form-data">
@csrf
                    <div class="form-group">
                        <label for="marque">Marque</label>
                        <input type="texte" class="form-control" id="marque"
                               placeholder="Marque du velo" name="marque">


                    </div>
                    <div class="form-group">
                        <label for="description">Modele</label>
                        <textarea class="form-control" id="madele" rows="3" name="modele"></textarea>

                    </div>
                    <input 
                    type="file"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="photo"
                    placeholder="Upload image...">

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    
   
@endsection