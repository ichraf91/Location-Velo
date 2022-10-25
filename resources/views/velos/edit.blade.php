@extends('velos.layout')

@section('content')
<div class="card">
        <header class="card-header">

        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('velos.update',$data->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="marquevelo">Marque</label>
                        <input type="texte" class="form-control" id="marque"
                               value="{{ old('marque', $data->marque) }}" name="marque">

                    </div>
                    <div class="form-group">
                        <label for="modele">Modele</label>
                        <textarea class="form-control" id="modele" rows="3" name="modele">{{$data->modele}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection