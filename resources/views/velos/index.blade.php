@extends('velos.layout') 
@section('content')
<div class="col-md-12">
     <div class="card-body">
        <div >
     @if(count($velos)!=0)
                        <a href="{{ url('/category/velos/'.$velos->first()->category_id.'/create') }}" class="btn btn-success btn-sm" title="Add New Velo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
@else
<a href="{{ url('/category/velos/'.$id.'/create') }}" class="btn btn-success btn-sm" title="Add New Velo">
<i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </a>
                        <br/>
                        <br/>
@endif

</div>
</div>
    <div class="table-responsive">
    
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>ID</th>
                <th>Marque</th>
                <th>Desciption</th>
               
                <th>Image</th>
                
            </thead>

            <tbody>
                @foreach($velos as $row)
                <tr>

                    <td>{{$row->id }}</td>
                    <td>{{$row->marque }}</td>
                    <td>{{$row->description }}</td>
                    
                    <td><img src="{{ asset($row->photo) }}" width='50' height='50' class="img img-responsive" /></td>

                    <td>
             <a href="{{ url('/category/velos/'.$row->id.'/edit')}}" class="btn btn-primary">Edit</a>

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
        <?php echo $velos->render(); ?>
    </div>
</div>

@endsection