@extends('category.layout') 
@section('content')


    <div class="Container">
        <div class="row">
            <div class="col-md-12">
               <div class ="card">
                <div class ="card-header">
                    <h4>Create Category Details</h4>
                    <a href="{{url('category')}}" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('/category/')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input type="text" name="name"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Category Slug</label>
                            <input type="text" name="slug"class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class ="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
               </div>
            </div>
        </div>
        @endsection