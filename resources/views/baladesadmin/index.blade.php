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
            <h3 class="card-header">Liste des balades</h3>
            <div class="card-body">
            @foreach($balades as $balade)
            <div class="media mb-2 ">
                <div class="media-left">
                <img src="{{$balade->image}}" width="100" height="100" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="media-body">
                <h3 class="text-info">
                       <a href="{{route('baladesadmin.show',$balade->id)}}" class="btn btn-link">
                      Titre : {{$balade->name}}
                       </a>
                </h3>
                <h3 class="text-info">               
                   Status : {{$balade->status}}                      
                </h3>
                <h3 class="text-info">               
                   Nb de personnes {{$balade->quantity}}                      
                </h3>
                <h3 class="text-info">  
                    date de début: {{$balade->date}}        
                </h3>
                <!-- <p class="d-flex flex-row justify-content-star">
                    <span class="badge badge-danger mx-3">categorie : {{$balade->categorie_balade_id}}</span>
                     <span class="badge badge-primary mr-3">Prix Journée : {{$balade->prixJ}} dt</span>
                     
                </p> -->
            </div>
            </div>
            <hr>
            @endforeach
       </div>
       </div>
         </div>
@endsection

