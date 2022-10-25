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
<form method="post" action="{{ url('/velos')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="category_id" id="category_id" value="{{$categories->id}}" id="category_id" />
                    <div class="form-group">
                        <label for="marque">Marque</label>
                        <input type="texte" class="form-control" id="marque"
                               placeholder="Marque du velo" name="marque">


                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>

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