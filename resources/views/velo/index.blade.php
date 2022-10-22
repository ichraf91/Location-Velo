@extends('layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-md-4">
        <div class="card bg-light border border-primary ">
            <h3 class="card-header">
                Recherche
             </h3>
    <div class="card-body">
    <form action="#" method="post">
    <div class="form-group ">
    <label for="search">Recherche</label>
    <input type="text" name="search" id="" class="form-control" placeholder="Recherche..." aria-describedy="helpId">
    </div>
    <div class="form-group">
   <button type="submit" class="btn btn-primary">Valider</button>
   </div>
   </form>
   </div>
     </div>
       </div>
       <div class="col.md-8">
        <div class="card border border-primary"  >
            <h3 class="card-header">Tous les vélos</h3>
            <div class="card-body">
            @foreach($bikes as $bike)
            <div class="media mb-2 ">
                <div class="media-left">
                <img src="{{$bike->image}}" width="100" height="100" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="media-body">
                <h3 class="text-info">
                       <a href="{{route('bikes.show',$bike->id)}}" class="btn btn-link">
                       {{$bike->marque}}
                       </a>
                </h3>
                <p class="d-flex flex-row justify-content-star">
                    <span class="badge badge-danger mx-3">Modèle : {{$bike->model}}</span>
                     <span class="badge badge-primary mr-3">Prix Journée : {{$bike->prixJ}} dt</span>
                     @if($bike->dispo)
                         <span class="badge badge-success">
                                Disponible
                         </span>
                         @else
                         <span class="badge badge-warning">
                                Réservé
                          </span>
                         @endif
                </p>
            </div>
            </div>
            <hr>
            @endforeach
       </div>
       </div>
         </div>
@endsection

