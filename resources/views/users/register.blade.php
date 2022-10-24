@extends('layouts.master')
@section('content')
<div class="row my-4">
    <div class="col-md-14 mx-auto">
        <div class="card bg-light border border-primary shadow-sm">

            <h3 class="card-header ">
        Inscription
             </h3>
    <div class="card-body">
    <form action="{{route('users.register')}}" method="POST">
    @csrf
    <div class="form-group ">
        <label for="name">Nom & Prenom</label>
        <input type="text" name="name" id="" class="form-control" placeholder="Nom & Prenom..." aria-describedy="helpId">
        </div>
        <div class="form-group ">
            <label for="tel">Télephone</label>
            <input type="tel" name="tel" id="" class="form-control" placeholder="Télephone..." aria-describedy="helpId">
            </div>
            <div class="form-group ">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="" class="form-control" placeholder="Ville..." aria-describedy="helpId">
                </div>
    <div class="form-group ">
    <label for="email">Email</label>
    <input type="email" name="email" id="" class="form-control" placeholder="Email..." aria-describedy="helpId">
    </div>
        <div class="form-group ">

      <label for="password">Password</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Mot de passe..." aria-describedy="helpId" style="
    margin-bottom: 1rem;
">
    <div class="form-group">
   <button type="submit" class="btn btn-primary">Valider</button>
   </div>
   </form>
  </div>
       </div>
       </div>
         </div>
@endsection

