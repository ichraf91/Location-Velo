@extends('layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light border border-primary shadow-sm">

            <h3 class="card-header ">
        Louer ce vélo
             </h3>
             <div class="row my-3">
             <div class="com-md-12">
              <div class="card">
                         <h3 class="text-info p-4">{{$bike->marque}}</h3>
                         <div class="card-img-top">
                           <img src="{{$bike->image}}" class="img-fluid rounded m-2" alt="">

                         </div>
                         <div class="card-body">
                             <p class="d-flex flex-row justify-content-star">
                                 <span class="badge badge-danger mx-3">Modèle : {{$bike->model}}</span>
                                  <span class="badge badge-primary mr-3">Prix Journée : {{$bike->prixJ}} dt</span>

                             </p>
                             </div>
             </div>
             </div>
    <div class="card-body">
    <form action="{{route('commands.store')}}" method="POST">
    @csrf
    <div class="form-group ">
        <label for="dateL">Date Début</label>
        <input type="date" name="dateL" id="" class="form-control" placeholder="Date Début..." aria-describedy="helpId">
        </div>
        <div class="form-group ">
            <label for="dateR">Date Fin</label>
            <input type="date" name="dateR" id="" class="form-control" placeholder="Date Fin..." aria-describedy="helpId">
            <input type="hidden" name="bike_id" value="{{$bike->id}}">
            </div>

    <div class="form-group">
   <button type="submit" class="btn btn-primary">Valider</button>
   </div>
   </form>
  </div>
       </div>
       </div>
         </div>
@endsection

