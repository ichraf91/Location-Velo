@extends('category.layout') 
@section('content')


    <div class="Container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                <div class="alert  alert-success">{{ session('message') }}</div>
                @endif
               <div class ="card">
                <div class ="card-header">
                    <h4>Category Details</h4>
                    <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add New Category</a>
                </div>
               </div>
            </div>
            <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Slug</th>
                           
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="Content">
        
        @foreach($categories as $item)

                
                <tr style="padding: 6px 12px; background-color: #E1EBE8; color: #6E807A; border-radius: 4px;">
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                

                <!-- <td class="tag-cloud-link">{{ $item->status }}</td> -->
                <td>
                <a href="{{ url('/category/velos/'.$item->id) }}" title="List Velo"><button class="btn btn-success "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Velo List</button></a>
             <a href="{{ url('/category/velos/'.$item->id.'/create/')}}" title="create Velo"><button class="btn btn-success "><i class="fa fa-eye" aria-hidden="true"></i> Add new Velo</button></a>
                                          
                           </td>
                                        
</tr>

  @endforeach
  </tbody>
                      </table>
     </div>

@endsection