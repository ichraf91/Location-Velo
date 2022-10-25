@extends('layouts.master')
@section('content')
<div class="row my-4">

    <div class="col.md-8">
        <div class="card border border-primary">
            <h3 class="card-header">{{$balades->name}}</h3>
            <div class="card-img-top">
                <img src="{{$balades->image}}" class="img-fluid rounded m-2" alt="">

            </div>
            <div class="card-body">
                <p class="d-flex flex-row justify-content-star">
                    <span class="badge badge-danger mr-3">date : {{$balades->date}}</span>
                    <span class="badge badge-primary mr-3">Description : {{$balades->description}}</span>
                
                </p>
                <p class="d-flex flex-row justify-content-star">
                    
                    <span class="badge badge-primary mr-3">Status : {{$balades->status}}</span>
                </p>
                <p class="d-flex flex-row justify-content-star">
                    <!-- show categoriebalade name that has the same balades_id -->
                    <!-- <span class="badge badge-primary mr-3">Categorie : {{$balades->categoriebalade->name}}</span> -->
           
                </p>
                <p>            
                    <a href="{{route('baladesadmin.edit',$balades->id)}}" class="btn btn-primary btn-block">Modifier</a>
              
                </p>

            </div>
        </div>
    </div>
    @endsection