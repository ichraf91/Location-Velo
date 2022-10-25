@extends('layouts.master')
@section('content')
<div class="row my-4" style="margin-left: 40%;">
    <div class="col-md-14 mx-auto">
        <div class="card bg-light border border-primary shadow-sm">

            <h3 class="card-header ">
                Creer une nouvelle balade
            </h3>
   
            <div class="pb-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="card-body ">
                <form action="{{route('baladesadmin.store')}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="name">Titre</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Titre" aria-describedy="helpId">
                    </div>
                    <div class="form-group ">
                        <label for="address">Addresse</label>
                        <input type="text" name="address" id="" class="form-control" placeholder="Addresse..." aria-describedy="helpId">
                    </div>
                    <div class="form-group ">
                        <label for="mobile">Numéro tel</label>
                        <input type="phoneNumber" name="mobile" id="" class="form-control" placeholder="Numéro tel..." aria-describedy="helpId">
                    </div>
                    <div class="form-group ">
                        <label for="quantity">Nombre de personnes autorisé</label>
                        <input type="text" name="quantity" id="" class="form-control" placeholder="Nb personnes..." aria-describedy="helpId">
                    </div>
                    <div class="form-group ">

                    <div class="form-group ">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="" class="form-control"  aria-describedy="helpId">
                    </div>
                    <div class="form-group ">

                        <label for="Status">Status</label>
                        <input type="text" name="Status" id="" class="form-control" placeholder="Status..." aria-describedy="helpId" style="
    margin-bottom: 1rem;
">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Valider</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection