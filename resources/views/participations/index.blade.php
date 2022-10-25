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
                <div class="col col-md-6"><b>Mes Participations</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('events.index') }}" class="btn btn-success btn-sm float-end">Liste des évenements</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                @if(count($events) > 0)

                    @foreach($events as $row)

                        <tr>
                            <td>{{ $row->nomEvent }}</td>
                            <td>{{ $row->dateEvent }}</td>
                            <td>{{ $row->lieuEvent }}</td>
                            <td>{{ $row->typeEvent }}</td>
                            <td>
                                <form method="post" action="{{ route('participations.pdf', ['eventId'=>$row->id,'userId'=>$userId]) }}">
                                    @csrf
                                        <input type="submit" class="btn btn-primary btn-sm" value="Télecharger" />
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Aucun Participation disponible
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

@endsection
