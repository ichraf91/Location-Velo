
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
    <div class="card" >
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Modifier la cetegorie  {{$reclamation->nom}} </b></div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('reclamation.update', $reclamation->id) }}">
                @csrf
                @method('PUT')
               

                            <div class="row mb-3">
                                <label for="nomEvent">Nom :</label>
                                <div class="col-sm-5">
                                    <input  value="{{ $reclamation->titre }}" type="text" name="titre" class="form-control" id="titre" style="border: solid 1px cornflowerblue "/>
                                </div>
                            </div>

                            <div class="row mb-3">
                            <label for="description">Description:</label>
                            <div class="col-sm-5">
                                <textarea  name="description" class="form-control" id="description" style="border: solid 1px cornflowerblue ">
                                {{ $reclamation->description }}
                            </textarea>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="typeEvent">Type :</label>
                            <div class="col-sm-5">
                                <select name="categorie_id" class="form-control form-select" id="categorie_id" style="border: solid 1px cornflowerblue ">
                                @foreach($cat as $x)
                                @if($reclamation->categorie_id == $x->id)   
                                <option value="{{$x->id}}" selected>{{$x->nom}} </option>
                                @else
                                <option value="{{$x->id}}">{{$x->nom}} </option>
                                @endif
                                @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label for="nomEvent">Status :</label>
                                <div class="col-sm-5">
                                    <input  value="{{ $reclamation->status }}" type="text" name="status" class="form-control" id="status" style="border: solid 1px cornflowerblue "/>
                                </div>
                            </div>




        
                <div style="margin-left: 25%">
                    <input type="hidden" name="hidden_id" value="{{ $reclamation->id }}" />
                    <input type="submit" class="btn btn-primary" value="Modifier" />
                    <a href="{{ route('reclamation.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>


@endsection('content')
