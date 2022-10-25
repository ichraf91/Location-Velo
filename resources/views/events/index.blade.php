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
                <div class="col col-md-6"><b>Les Évenements Disponibles</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('events.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Date d'ouverture</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                @if(count($data) > 0)

                    @foreach($data as $row)

                        <tr>
                            <td>{{ $row->nomEvent }}</td>
                            <td>{{ $row->dateEvent }}</td>
                            <td>{{ $row->typeEvent }}</td>
                            <td>
                                <form method="post" action="{{ route('events.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('events.show', $row->id) }}" class="btn btn-primary btn-sm" style="margin-right: 1%">Détail</a>
                                    @if($row->userId == $userId)
                                        <a href="{{ route('events.edit', $row->id) }}" class="btn btn-warning btn-sm" style="margin-right: 1%">Modifier</a>
                                        <input type="submit" onclick="return confirm('Voulez-vous supprimer {{$row->nomEvent}} ?')" class="btn btn-danger btn-sm" value="Supprimer" />
                                    @endif
                                </form>

                            </td>
                        </tr>

                    @endforeach

                @else
                    <tr>
                        <td colspan="5" class="text-center">Aucun Évenement disponible
                        </td>
                    </tr>
                @endif
            </table>
            {!! $data->links() !!}
        </div>
    </div>

@endsection
