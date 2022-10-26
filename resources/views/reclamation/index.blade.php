@extends('layouts.master')
@section('content')
    @if($message = Session::get('success'))

        <div class="alert alert-success">
            {{ $message }}
        </div>

    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Les Reclamations</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('reclamation.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Status</th>
                </tr>
                @if(count($data) > 0)

                    @foreach($data as $row)

                        <tr>
                             <td>{{ $row->id}}</td>
                            <td>{{ $row->titre}}</td>
                            <td>{{ $row->description}}</td>
                            <td>{{ $row->categorie->nom}}</td>
                            <td>{{ $row->status}}</td>
                            <td>
                                <form method="post" action="{{ route('reclamation.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('reclamation.show', $row->id) }}" class="btn btn-primary btn-sm" style="margin-right: 1%">Détail</a>
                                    @if($row->userId == $userId)
                                        <a href="{{ route('reclamation.edit', $row->id) }}" class="btn btn-warning btn-sm" style="margin-right: 1%">Modifier</a>
                                        <input type="submit" onclick="return confirm('Voulez-vous supprimer {{$row->nom}} ?')" class="btn btn-danger btn-sm" value="Supprimer" />
                                    @endif
                                </form>

                            </td>
                        </tr>
 
                    @endforeach

                @else
                    <tr>
                        <td colspan="5" class="text-center">N/A
                        </td>
                    </tr>
                @endif
            </table>
            {!! $data->links() !!}
        </div>
    </div>

@endsection
