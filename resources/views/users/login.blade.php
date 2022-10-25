@extends('layouts.oldmaster')
@section('content')
    <div class="row my-6" style="width: 100%; margin-top: 10%;">
        @auth
        @else
            <div class="col-md-14 mx-auto">
                <div class="card border border-primary shadow-sm" style="width: 500px; background-color: lightblue">
                    <h3 class="card-header ">
                        Connexion
                    </h3>
                    <div class="card-body">
                        <form action="{{route('users.auth')}}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Email..."
                                       aria-describedy="helpId">
                            </div>
                            <div class="form-group ">

                                <label for="password">Password</label>
                                <input type="password" name="password" id="" class="form-control"
                                       placeholder="Mot de passe..." aria-describedy="helpId" style="
    margin-bottom: 1rem;
">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
