@extends('velos.layout') 
@section('content')
<div class="col-md-12">
     <div class="card-body">
                        <a href="{{ url('/velos/create') }}" class="btn btn-success btn-sm" title="Add New Velo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>

    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>ID</th>
                <th>Marque</th>
                <th>Modele</th>
                <th>Image</th>
                
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr>

                    <td>{{$row->id }}</td>
                    <td>{{$row->marque }}</td>
                    <td>{{$row->modele }}</td>
                    <td><img src="{{ asset ($row->photo) }}" width='50' height='50' class="img img-responsive" /></td>

                    <td>
                        <a href="{{ route('velos.edit', $row->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('velos.destroy', $row->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div>
        <?php echo $data->render(); ?>
    </div>
</div>

@endsection