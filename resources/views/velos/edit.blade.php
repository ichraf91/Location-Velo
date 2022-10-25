@extends('velos.layout')

@section('content')
<div class="card">
        <header class="card-header">

        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ url('/velos/'.$velos->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{$velos->id}}" id="id" />
                    <input type="hidden" name="category_id" id="category_id" value="{{$velos->category_id}}" id="id" />
                    <div class="form-group">
                        <label for="marquevelo">Marque</label>
                        <input type="texte" class="form-control" id="marque"
                               value="{{ old('marque', $velos->marque) }}" name="marque">

                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{$velos->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection