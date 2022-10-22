@extends('layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light border border-primary shadow-sm">

            <h3 class="card-header ">
        Connexion
             </h3>
    <div class="card-body">
    <form action="{{route('users.auth')}}" method="POST">
    @csrf
    <div class="form-group ">
    <label for="email">Email</label>
    <input type="email" name="email" id="" class="form-control" placeholder="Email..." aria-describedy="helpId">
    </div>
        <div class="form-group ">

      <label for="password">Password</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Mot de passe..." aria-describedy="helpId">
    <div class="form-group">
   <button type="submit" class="btn btn-primary">Valider</button>
   </div>
   </form>
  </div>
       </div>
       </div>
         </div>
@endsection

