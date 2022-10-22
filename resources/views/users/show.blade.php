@extends('layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-md-4">
    <div class="card text-left">
    <img class="card-img-top" src="{{$user->image}}" alt="">
    <div class="card body">
    <h4 class="card-title">{{$user->name}}</h4>
    <p class="card-text d-flex flex-row align-items-center">
        <span class="badge badge-primary mr-2">Téléphone: {{$user->tel}}</span>


     </p>

    </div>
    </div>

       </div>
       <div class="col-md-8">
       <table class="table">
        <thead>
            <tr>
                <th>Marque</th>
                <th>Model</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Prix TTC</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach(auth()->user()->commands as $command)
<tr>
        <td>{{App\Models\Bike::findOrFail($command->bike-id)->marque}}</td>
        <td>{{App\Models\Bike::findOrFail($command->bike-id)->model}}</td>
        <td>{{App\Models\Bike::findOrFail($command->bike-id)->prixJ}}</td>
        <td>{{$command->bike->dateL}}</td>
        <td>{{$command->bike->dateR}}</td>
        <td>{{$command->bike->prixTTC}}</td>


        </tr>

        @endforeach

        </tbody>

       </table>
       </div>
         </div>
@endsection

